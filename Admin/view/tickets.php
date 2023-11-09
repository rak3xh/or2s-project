<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tickets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>

    <?php include('../pages/header.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2">
          <?php include('../pages/sidebar.php'); ?>
        </div>
        <div class="col-sm-10 mt-5">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Stations</li>
            </ol>
          </nav>
          <div id="title">
            <h1>Reservation Lists</h1>
            <p>All Reserved Ticket Lists - OR2S</p>
          </div>

          <button type="button" class="btn btn-success">+ Add Reservation</button>

          <div class="tableList">
            <table>
              <thead>
                <tr>
                  <th>Sl. No.</th>
                  <th>Ticket Number</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Train Num</th>
                  <th>Train Name</th>
                  <th>Class</th>
                  <th>Quota</th>
                  <th>Source</th>
                  <th>Destination</th>
                  <th>Seat No.</th>
                  <th>Cost</th>
                  <th>Status</th>
                  <th>View</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><i class='fas fa-eye view'></i></td>
                  <td><i class='fas fa-edit edit'></i></td>
                  <td><i class='fas fa-trash delete'></i></td>
                </tr>
              </tbody>
            </table>
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