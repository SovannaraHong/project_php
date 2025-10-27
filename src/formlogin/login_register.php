<?php
session_start();
require_once'config.php';
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['register'])){
    $name =$_POST['name'];
    $email =filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $role =$_POST['role'];


    $sql = "INSERT INTO zando_tb(name,email,password,role)VALUES ('$name','$email','$password','$role')";
   try{
    mysqli_query($conn,$sql);
   }catch(mysqli_sql_exception){
    echo"not success";
   }
header("Location: index.php");
exit();

}


?>