<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "or2s";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect!");
}
?>