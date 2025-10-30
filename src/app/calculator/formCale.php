<?php
session_start(); // ✅ You used $_SESSION but didn’t start it

$value = ''; // ✅ define it early to avoid “undefined variable” notice
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // ✅ Validate numeric inputs properly
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = $_POST['opp'] ?? '';

    if ($num1 === false || $num2 === false) {
        $error = 'Please enter valid numbers.';
    } elseif (empty($operator)) {
        $error = 'Please select an operator.';
    } else {
        switch ($operator) {
            case "add":
                $value = $num1 + $num2;
                break;
            case "subtract":
                $value = $num1 - $num2;
                break;
            case "multiple":
                $value = $num1 * $num2;
                break;
            case "divide":
                if ($num2 == 0) {
                    $error = 'Cannot divide by zero.';
                } else {
                    $value = $num1 / $num2;
                }
                break;
            default:
                $error = "Invalid operator selected.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Calculator Layout</title>
<style>
    body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f0f0f0;
    }
    .calculator {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        width: 300px;
        text-align: center;
    }
    .calculator h2 {
        margin-bottom: 20px;
    }
    input, select, button {
        margin: 10px 0;
        padding: 10px;
        width: 100%;
        font-size: 16px;
        border-radius: 6px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        background-color: #45a049;
    }
    .result, .error {
        margin-top: 15px;
        font-size: 18px;
        font-weight: bold;
    }
    .error {
        color: red;
    }
</style>
</head>
<body>
    <div class="calculator">
        <h2>Simple Calculator</h2>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="number" step="any" name="num1" placeholder="Enter first number" required>
            <input type="number" step="any" name="num2" placeholder="Enter second number" required>
            <select name="opp" required>
                <option value="">Select operator</option>
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiple">*</option>
                <option value="divide">/</option>
            </select>
            <button type="submit" name="submit">Calculate</button>
        </form>

        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php elseif ($value !== ''): ?>
            <div class="result">Result: <?= $value ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
