<?php
session_start();
require_once'configServer.php';


if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST['register'])){
    $username = filter_input(INPUT_POST,'name',FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $role = $_POST['role'];

$checkEmail = $conn->query("SELECT email FROM zando_user WHERE email ='$email' ");
if($checkEmail->num_rows>0){
    $_SESSION['register_error'] = "Email already exists!";
    $_SESSION['active_form'] = 'register';
    header("Location: index.php");
    exit();
}
else{
$conn->query("INSERT INTO zando_user(name,email,password,role) VALUES ('$username','$email','$password','$role')");
  $_SESSION['active_form'] = 'login';

  
}
     header("Location: index.php");
    exit();
}
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['login'])){
  $email = $_POST['email'];
  $password=$_POST['password'];
    $resultCheckEmail = $conn->query("SELECT * FROM zando_user WHERE email ='$email'");
    if($resultCheckEmail->num_rows>0){
        $userLog = $resultCheckEmail->fetch_assoc();
        if(password_verify($password,$userLog['password'])){
            $_SESSION['username']=$userLog['name'];
            $_SESSION['role']=$userLog['role'];
            $role =strtolower(trim($userLog['role']));
            if($role==="admin"){
                header("Location: zandoAdmin.php");
                exit();

            }else{
                header("Location: zandoUser.php");
                exit();
            }
            exit();
        }
    }
    $_SESSION['login_error']='Incorrect email or password';
    $_SESSION['active_form']='login';
      header("Location: index.php");
    exit();
}

?>