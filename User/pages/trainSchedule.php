<?php 
session_start();
include("../db/connection.php");

if(isset($_POST['searchText'])){
	$train_num = $_POST['searchText'];

	$query = "select train_num,train_name from trains where train_num = '$train_num'";
	$result = mysqli_query($con, $query);

	$trains = mysqli_fetch_array($result);

	return $result;
}
?>