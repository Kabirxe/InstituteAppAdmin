<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "institutedb";

$conn = mysqli_connect($host,$username,$password,$db);

if(!$conn){
    die($conn);
}
?>