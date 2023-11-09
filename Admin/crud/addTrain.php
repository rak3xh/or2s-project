<?php
session_start();
include("../../User/db/connection.php");

if(isset($_POST['submit'])){
    $train_num=$_POST['number'];
    $train_name=$_POST['name'];
    $source=$_POST['source'];
    $destination=$_POST['dest'];
    
    $query = "insert into `trains` (train_num,train_name,source,destination)
    values ($train_num,'$train_name',$source,$destination)";
    $result = mysqli_query($con,$query);

    if($result){
        echo "<h1>data inserted successfully!!</h1>";
    }else{
        die("failed to connect!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Trains</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <style>
    .editBtn a{
        color: #fff;
        text-decoration: none;
    }
    form input{
        text-transform: uppercase;
    }
  </style>
  <body>

    <?php include('../pages/header.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <?php include('../pages/sidebar.php'); ?>
        </div>
        <div class="col-sm-10 mt-5">
          <div id="title">
            <h1>Add Train</h1>
            <p>SER Express Railway Trains - OR2S</p>
          </div>
            <div class="edit-container">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="trainNum">Train Number</label>
                            <input type="number" name="number" class="form-control" id="trainNum" maxlength="5" placeholder="Train Number">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="trainName">Train Name</label>
                            <input type="text" name="name" class="form-control" id="trainName" placeholder="Train Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="source">Source</label>
                            <input type="number" name="source" class="form-control" id="source" placeholder="Source">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="dest">Destination</label>
                            <input type="number" name="dest" class="form-control" id="dest" placeholder="Destination">
                        </div>
                    </div>       
                    <button type="submit" class="btn btn-success editBtn" name="submit">
                        <a href=""> + Add</a>
                    </button>
                </form>
            </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  </body>
</html>