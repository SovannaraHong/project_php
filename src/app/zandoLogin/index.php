<?php
session_start();
$errors=[
    'login' =>$_SESSION['login_error']??'',
    'register' =>$_SESSION['register_error']??''
];
$activeForm =$_SESSION['active_form'] ?? 'register';
session_unset();
function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>":'';
}
function isActive($formName,$activeForm){
    return $formName ===$activeForm?'active':'';

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zando Login & Register</title>
    <style>
        /* Reset */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364); /* dark techy gradient */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            width: 400px;
            padding: 40px 35px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.18);
            position: relative;
        }

        h2 {
            text-align: center;
            color: #fff;
            font-size: 28px;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, select {
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            border: none;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 16px;
            transition: 0.3s;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        input:focus, select:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 10px #00f0ff;
        }

        select {
            color: #fff;
        }

        button {
            padding: 15px;
            margin-top: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(90deg, #00f0ff, #007acc);
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(90deg, #007acc, #00f0ff);
            transform: scale(1.05);
        }

        a {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #aaa;
        }

        a {
            color: #00f0ff;
            cursor: pointer;
            font-weight: bold;
        }

    

        /* Cool animated background effect */
        body::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0,255,255,0.2), transparent 70%);
            animation: rotate 20s linear infinite;
            z-index: 0;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .container, form {
            position: relative;
            z-index: 1;
        }
        option{
            color: black;
        }
         .form{
            display: none;
         }
         .active{
            display: flex;
         }
    
    </style>
</head>
<body>
    <div class="container">
        <!-- Registration Form -->
        <form id="registerForm" class="form <?= isActive('register',$activeForm)?>" action="log_register.php" method="post">
            <h2>Register</h2>
            <?= showError($errors['register'])?>
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit" name="register">Register</button>
            <a href="#" class="switch" onclick="toggleForms()" >Already have an account? Login</a>

        </form>

        <!-- Login Form -->
        <form id="loginForm" class=" form <?= isActive('login',$activeForm)?>"  action="log_register.php" method="post">
            <h2>Login</h2>
            <?= showError($errors['login'])?>

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            <a href="#" class="switch" onclick="toggleForms()" >Don't have an account?Register</a>
        </form>
    </div>

    <script>
       function toggleForms() {
    document.getElementById('registerForm').classList.toggle('active');
    document.getElementById('loginForm').classList.toggle('active');
}

    </script>
</body>
</html>
