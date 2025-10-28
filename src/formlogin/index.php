<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login & Register Form</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #2563eb, #1e3a8a);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }

    .form-container {
      background: #ffffff;
      padding: 40px 35px;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      width: 350px;
      text-align: center;
      position: relative;
      overflow: hidden;
      animation: fadeIn 0.7s ease;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }

    h2 {
      margin-bottom: 25px;
      color: #1e3a8a;
    }

    label {
      display: block;
      text-align: left;
      font-weight: 600;
      margin-top: 15px;
      color: #333;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 15px;
      transition: 0.3s;
    }

    input:focus, select:focus {
      border-color: #2563eb;
      outline: none;
      box-shadow: 0 0 4px rgba(37, 99, 235, 0.4);
    }

    button {
      width: 100%;
      margin-top: 25px;
      padding: 12px;
      background: #2563eb;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #1e40af;
      transform: translateY(-2px);
    }

    .icon-lock {
      font-size: 40px;
      color: #2563eb;
      margin-bottom: 10px;
    }

    .link {
      margin-top: 15px;
      display: block;
      color: #2563eb;
      text-decoration: none;
      font-size: 14px;
      transition: 0.3s;
    }

    .link:hover {
      text-decoration: underline;
    }

    .form {
      display: none;
      animation: fadeIn 0.4s ease;
    }

    .form.active {
      display: block;
    }

  </style>
</head>
<body>

  <div class="form-container">
    <div class="icon-lock">🔒</div>

    <!-- LOGIN FORM -->
    <form id="loginForm" class="form" action="login_register.php" method="post">
      <h2>Login</h2>
      <label>Email Address</label>
      <input type="email" name="email" placeholder="Enter your email" required>

      <label>Password</label>
      <input type="password" name="password" placeholder="Enter your password" required>

      <button type="submit" name="login">Login</button>
      <a href="#" class="link" onclick="formActive('registerForm')">Don’t have an account? Register</a>
    </form>

    <!-- REGISTER FORM -->
    <form id="registerForm" class="form active" action="login_register.php" method="post">
      <h2>Create Account</h2>
      <label>Full Name</label>
      <input type="text" name="name" placeholder="Enter your name" required>

      <label>Email Address</label>
      <input type="email" name="email" placeholder="Enter your email" required>

      <label>Password</label>
      <input type="password" name="password" placeholder="Enter your password" required>

      <label>Role</label>
      <select name="role" required>
        <option value="">-- Select Role --</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
        <option value="guest">Guest</option>
      </select>

      <button type="submit" name="register">Register</button>
      <a href="#" class="link" onclick="formActive('loginForm')">Already have an account? Login</a>
    </form>

  </div>

<script>
function formActive(formId){
  document.querySelectorAll(".form").forEach(form => form.classList.remove("active"));
  document.getElementById(formId).classList.add("active");
}
</script>
</body>
</html>
