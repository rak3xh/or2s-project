<?php
session_start();
include("../../User/db/connection.php");

$div_data = [];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | 404 Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
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
            <div class="col-sm-10" style="margin-top: 200px;">
                <center>
                    <h1>Hi, Buddy!!</h1>
                    <div style="font-size: 100px;"><b>COMMING SOON</b></div>
                    <div style="font-size: 50px;">This Page is Under Maintainace</div>
                    <div>
                        <button class="btn btn-secondary">
                            <a href="../view/dashboard.php" style="color: #fff;text-decoration: none;">Go To Dashboard</a>
                        </button>
                    </div>
                </center>
            </div>
        </div>
    </div>
  </body>
</html>