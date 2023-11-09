<?php
session_start();
include("../../User/db/connection.php");

$div_data = [];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | Divisions</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>

    <?php include('../layouts/header.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <?php include('../layouts/sidebar.php'); ?>
        </div>
        <div class="col-sm-10 mt-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Divisions</li>
            </ol>
          </nav>
          <div id="title">
            <h1>Divisions</h1>
            <p>SER Railway Divisions - OR2S</p>
          </div>

          <button type="button" class="btn btn-success">+ Add Division</button>

          <?php 
            if(isset($div_data)){
              $query = "select * from division";
              $result = mysqli_query($con, $query);
            ?>

          <div class="tableList">
            <table>
              <thead>
                <tr>
                  <th>Sl. No.</th>
                  <th>Division Name</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  if($result){
                    if($result && mysqli_num_rows($result) > 0){
                      while($div_data = mysqli_fetch_array($result)){
                  ?>
                <tr>
                  <td><?php echo $div_data['division_id']; ?></td>
                  <td><?php echo $div_data['div_name']; ?></td>
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