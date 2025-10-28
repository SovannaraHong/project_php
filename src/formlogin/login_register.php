<?php
session_start();
require_once'config.php';
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['register'])){
    $name = $_POST['name'];
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $role=$_POST['role'];
   $checkEmail = $conn->query("SELECT email FROM zando_tb WHERE email ='$email'");

    if($checkEmail->num_rows>0){
        $_SESSION['register_error']='email has already exit in data';
        $_SESSION['active_form']='Register!';
    }else{
$conn->query("INSERT INTO zando_tb(name,email,password,role)VALUES('$name','$email','$password','$role')");
header("Location: index.php");
    }
    header("Location: index.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"]==='POST' && isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM zando_tb WHERE email='$email'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['name'];
            $_SESSION['role'] = $user['role'];
$role = strtolower(trim($user['role']));
            if($user['role'] === "admin"){
                header("Location: adminPage.php");
                exit();
            } else {
                header("Location: userPage.php");
                exit();
            }
        }
    }

    // If login fails
    $_SESSION['login_error'] = "Invalid email or password";
    header("Location: index.php");
    exit();
}

?> 