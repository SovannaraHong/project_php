<?php
$host ='localhost';
$user ='root';
$pass ='';
$database ='zando_form';
$conn =new mysqli($host,$user,$pass,$database);
if($conn->connect_error){
    die("connected Fail"). $conn->connect_error;
}

?>