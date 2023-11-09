<?php

include("../../../User/db/connection.php");

extract($_POST);

if(isset($_POST['train']) && isset($_POST['source']) && isset($_POST['dest'])
 && isset($_POST['arr']) && isset($_POST['dept']) && isset($_POST['distance']) && isset($_POST['days'])){

  $query = "INSERT INTO timetable (train_id,source,dest,arr_time,dept_time,dist,days) 
  VALUES ('$train','$source','$dest','$arr','$dept','$distance','$days')";

  $result = mysqli_query($con, $query);
}
?>