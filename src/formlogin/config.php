<?php
$server="localhost";
$user ="root";
$pass ="";
$database_name ="databasestudent";

$conn = new mysqli($server,$user,$pass,$database_name);
if($conn->connect_error){
    die("connect fail:".$conn->connect_error);
}else{
    echo"success connect";
}

?>