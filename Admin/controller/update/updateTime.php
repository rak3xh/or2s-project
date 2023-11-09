<?php

include("../../../User/db/connection.php");


//get data
if(isset($_POST['updateid'])){
    $time_id=$_POST['updateid'];

    $query = "select * from timetable where id = $time_id";
    $result = mysqli_query($con, $query);

    $response = array();
    while($row = mysqli_fetch_assoc($result)){
        $response = $row;
    }
    echo json_encode($response);
}else{
    $response['status'] = 200;
    $response['message'] = "Invalid or Data not found!!";
}

//update data
if(isset($_POST['hiddendata'])){
    $t_id=$_POST['hiddendata'];

    $train=$_POST['updatetrain'];
    $source=$_POST['updatefrom'];
    $dest=$_POST['updateto'];
    $arrival=$_POST['updatearr'];
    $duration=$_POST['updateduration'];
    $dept=$_POST['updatedept'];
    $distance=$_POST['updatedist'];
    $days=$_POST['updatedays'];

    $query = "update timetable set train_id='$train', source='$source', dest='$dest',
     arr_time='$arrival', duration='$duration', dept_time='$dept', dist='$distance', days='$days' where id = $t_id";
    $result = mysqli_query($con, $query);
}
?>