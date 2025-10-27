<?php
$host='localhost';
$user ='root';
$pass='';
$database='zando_database';
$conn = new mysqli($host,$user,$pass,$database);
if($conn->connect_error){
    die("connected fail".$conn->connect_error);
}


?>