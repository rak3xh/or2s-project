<?php
session_start();
include("../../User/db/connection.php");

$train_data = [];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | Trains</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <style>
    .addBtn a{
      text-decoration: none;
      color: #fff;
    }
  </style>
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
              <li class="breadcrumb-item active" aria-current="page">Trains</li>
            </ol>
          </nav>
          <div id="title">
            <h1>Train Lists</h1>
            <p>SER Expresses - OR2S</p>
          </div>

          <button type="button" class="btn btn-success">+ Add Train</button>

          <?php 
            if(isset($train_data)){
              $query = "select * from trains";
              $result = mysqli_query($con, $query);
            ?>

          <div class="tableList">
            <table>
              <thead>
                <tr>
                  <th>Sl. No.</th>
                  <th>Train Number</th>
                  <th>Train Name</th>
                  <th>Source</th>
                  <th>Destination</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                  if($result){
                    if($result && mysqli_num_rows($result) > 0){
                      while($train_data = mysqli_fetch_array($result)){
                  ?>
                <tr>
                  <td><?php echo $train_data['id']; ?></td>
                  <td><?php echo $train_data['train_num']; ?></td>
                  <td><?php echo $train_data['train_name']; ?></td>
                  <td>
                    <?php 
                      if($train_data['schedule_from'] == 19){
                            echo 'KGP';
                      }else if($train_data['schedule_from'] == 1){
                            echo 'ADRA';
                      }else if($train_data['schedule_from'] == 21){
                            echo 'CKP';
                      }else{
                            echo $train_data['schedule_from'];
                      }
                    ?>
                  </td>
                  <td>
                    <?php 
                      if($train_data['schedule_to'] == 19){
                            echo 'KGP';
                      }else if($train_data['schedule_to'] == 1){
                            echo 'ADRA';
                      }else if($train_data['schedule_to'] == 21){
                            echo 'CKP';
                      }else if($train_data['schedule_to'] == 27){
                            echo 'RNC';
                      }else if($train_data['schedule_to'] == 20){
                            echo 'TATA';
                      }else {
                            echo $train_data['schedule_to'];
                      }
                    ?>
                  </td>
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

          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLongTitle"><b>Delete</b></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <i>Are you sure you want to delete?</i>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-dark" data-dismiss="modal"><i>Cancel</i></button>
                  <button type="button" class="btn btn-danger"><i>Delete</i></button>
                </div>
              </div>
            </div>
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