<?php

session_start();
require_once "config.php";
if($_SERVER['REQUEST_METHOD'] ==='POST' && isset($_POST["register"])){
    $username = $_POST["name"];
    $email =$_POST["email"];
    $password =password_hash($_POST["password"],PASSWORD_DEFAULT);
    $role =$_POST["role"];
    $checkEmail =$conn->query("SELECT email FROM students WHERE email = '$email'");
    if($checkEmail->num_rows>0){
        $_SESSION["register_error"] ='email is already registered';
        $_SESSION["active_form"]='register';
    }else{
        $conn->query("INSERT INTO students(name,email,password,role)VALUES ('$username','$email','$password','$role')");
    }
    header("Location: index.php");
    exit();

}
if($_SERVER['REQUEST_METHOD']==="POST"&&isset($_POST['login'])){
    $email = $_POST["email"];
    $password=$_POST["password"];
    $result = $conn->query("SELECT * FROM students WHERE email='$email'");
    if($result->num_rows>0){
        $user=$result->fetch_assoc();
        if(password_verify($password,$user['password'])){
            $_SESSION['name'] =$user['name'];
            $_SESSION["email"]=$user['email'];

            if($user['role'] ==='admin'){
                header("Location: adminPage.php");
            }else{
                header("Location: userPage.php");
            }
            exit();
        }
    }
    $_SESSION['login_error']="incorrect email or password";
    $_SESSION['active_form']='login';
    header("Location: index.php");
    exit();
}

?>