<?php

session_start();
if(isset($_SESSION['email'])){

}else{
  header("Location: ../index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | Admin Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>

    <?php include('../layouts/header.php'); ?>

    <div class="container-fluid dashboard">
      <div class="row">
        <div class="col-sm-2">
          <?php include('../layouts/sidebar.php'); ?>
        </div>
        <div class="col-sm-10 mt-2">
          <div id="title">
            <h1><i>Dashboard</i></h1>
            <p><span class="badge" style="background: #7e2525;">Admin Dashboard - OR2S</span></p>
          </div>

          <div class="row">
            <div class="col-sm-4">
            <a href="../view/users.php">
              <div class="users">
                <h2>Users <i class='fas fa-users' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>3</h4>
              </div>
            </a>
            </div>
            <div class="col-sm-4">
              <a href="../view/errorpage.php">
                <div class="passenger">
                  <h2>Passengers <i class='fa fa-users-between-lines' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                  <br>
                  <h4>6</h4>
                </div>
              </a>
            </div>
            <div class="col-sm-4">
            <a href="../view/errorpage.php">
              <div class="admins">
                <h2>Admin <i class='fas fa-user' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>1</h4>
              </div>
              </a>
            </div>
          </div>
          
          <div class="row">
            <div class="col-sm-4">
            <a href="../view/divisions.php">
              <div class="division">
                <h2>Divisions <i class='fas fa-route' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>4</h4>
              </div>
              </a>
            </div>
            <div class="col-sm-4">
            <a href="../view/trains.php">
              <div class="trains">
                <h2>Trains <i class='fas fa-train' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>29</h4>
              </div>
              </a>
            </div>
            <div class="col-sm-4">
            <a href="../view/stations.php">
              <div class="stations">
                <h2>Stations <i class='fas fa-location-dot' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>373</h4>
              </div>
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col">
            <a href="../view/timetable.php">
              <div class="timetable">
                <h2>Time Table <i class='fas fa-clock' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>6</h4>
              </div>
              </a>
            </div>
            <div class="col">
            <a href="../view/errorpage.php">
              <div class="ticket">
                <h2>Reservations <i class='fas fa-file' style="float:right;font-size:60px;color:#ffc107;"></i></h2>
                <br>
                <h4>4</h4>
              </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php include('../layouts/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </body>
</html>