<?php
session_start();
include("../../User/db/connection.php");

$stations_data = [];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | Stations</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body>

    <?php include('../layouts/header.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <?php include('../layouts/sidebar.php'); ?>
        </div>
        <div class="col-sm-10 mt-5">
          <div id="title">
            <h1>Station Lists</h1>
            <p>SER Railway Stations - OR2S</p>
          </div>

          <button type="button" class="btn btn-success">+ Add Station</button>

          <?php 
            if(isset($stations_data)){
              $query = "select * from stops";
              $result = mysqli_query($con, $query);
            ?>

          <div class="tableList">
            <table>
              <thead>
                <tr>
                  <th>Sl. No.</th>
                  <th>Station Code</th>
                  <th>Station Name</th>
                  <th>Division</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  if($result){
                    if($result && mysqli_num_rows($result) > 0){
                      while($stations_data = mysqli_fetch_array($result)){
                  ?>
                <tr>
                  <td><?php echo $stations_data['stop_id']; ?></td>
                  <td><?php echo $stations_data['stop_code']; ?></td>
                  <td><?php echo $stations_data['stop_name']; ?></td>
                  <td><?php echo $stations_data['division_id']; ?></td>
                  <td>
                      <button class="btn btn-warning">Update</button>
                  </td>
                  <td>
                      <button class="btn btn-danger">Delete</button>
                  </td>
                </tr>
                <?php 
                    }
                  }
                  }else{
                    ?>
                      <tr>
                        <td colspan="4"><center>NO RECORD FOUND !!</center></td>
                      </tr>
                    <?php
                  }
                }
                  ?>
              </tbody>
            </table>
          </div>
          
        </div>
      </div>
    </div>
    
    <?php include('../layouts/footer.php'); ?>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </body>
</html>