<?php
session_start();
include("../db/connection.php");


$type = 0;
if(isset($_POST['type'])){
    $type = $_POST['type'];
}

// Search result
if($type == 1){
    $searchText = mysqli_real_escape_string($con,$_POST['search']);

    $sql = "SELECT id,train_num,train_name FROM trains where concat(train_name,train_num) like '%".$searchText."%' order by train_name asc limit 5";

    $result = mysqli_query($con,$sql);

    $search_arr = array();

    while($fetch = mysqli_fetch_assoc($result)){
        $id = $fetch['id'];
        $num = $fetch['train_num'];
        $name = $fetch['train_name'];

        $search_arr[] = array("id" => $id, "train_num" => $num, "train_name" => $name);
    }

    echo json_encode($search_arr);
}

// get Train data
if($type == 2){
    $trainid = mysqli_real_escape_string($con,$_POST['trainid']);

    $sql = "SELECT * FROM trains where id=".$trainid;

    $result = mysqli_query($con,$sql);

    $return_arr = array();
    while($fetch = mysqli_fetch_assoc($result)){
        $trainnum = $fetch['train_num'];
        $trainname = $fetch['train_name'];
        $source = $fetch['schedule_from'];
        $dest = $fetch['schedule_to'];

        $return_arr[] = array(
            "train_num"=>$trainnum, 
            "train_name"=> $trainname,
            "schedule_from" => $source,
            "schedule_to" => $dest
        );
    }

    echo json_encode($return_arr);
}
