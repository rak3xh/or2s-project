<?php
session_start();
include("../../User/db/connection.php");

  $user_data = [];
  if(isset($_SESSION['id'])){
    $query = "select f_name,l_name from users where id = ".$_SESSION['id'];
    $result = mysqli_query($con, $query);

    if($result){
      if($result && mysqli_num_rows($result) > 0){
        $user_data = mysqli_fetch_assoc($result);
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OR2S | Users</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">
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
              <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
          </nav>
          <div id="title">
            <h1>All Users</h1>
            <p>All Users Lists - OR2S</p>
          </div>

          <button type="button" class="btn btn-success">+ Add User</button>

          <?php 
            if(isset($user_data)){
              $query = "select * from users";
              $result = mysqli_query($con, $query);
            ?>
          <div class="tableList">
            <table>
              <thead>
                <tr>
                  <th>Sl. No.</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Dob</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Aadhar</th>
                  <th>Pan</th>
                  <th>Address</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if($result){
                    if($result && mysqli_num_rows($result) > 0){
                      while($user_data = mysqli_fetch_array($result)){
                  ?>
                <tr>
                  <td><?php echo $user_data['id']; ?></td>
                  <td><?php echo $user_data['f_name']; ?> <?php echo $user_data['m_name']; ?> <?php echo $user_data['l_name']; ?></td>
                  <td><?php echo $user_data['gender']; ?></td>
                  <td><?php echo $user_data['date_of_birth']; ?></td>
                  <td><?php echo $user_data['phone']; ?></td>
                  <td><?php echo $user_data['email']; ?></td>
                  <td><?php echo $user_data['aadhar']; ?></td>
                  <td><?php echo $user_data['pan']; ?></td>
                  <td>
                    <?php echo $user_data['address']; ?>
                    <?php echo $user_data['city']; ?>
                    <?php echo $user_data['state']; ?>
                    <?php echo $user_data['pin_code']; ?>
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
                        <td colspan="11"><center>NO RECORD FOUND !!</center></td>
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

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputFirstName4">First Name</label>
                  <input type="text" class="form-control" id="inputFirstName4" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLastName4">Last Name</label>
                  <input type="text" class="form-control" id="inputLastName4" placeholder="Last Name">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputGender">Gender</label>
                  <select id="inputGender" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDate">Date of Birth</label>
                  <input type="date" class="form-control" id="inputDate">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPhone">Phone</label>
                  <input type="number" class="form-control" id="inputPhone" placeholder="Phone">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="aadhar">Aadhar</label>
                  <input type="number" class="form-control" id="aadhar" placeholder="Aadhar">
                </div>
                <div class="form-group col-md-6">
                  <label for="pan">PAN</label>
                  <input type="text" class="form-control" id="pan" placeholder="Pan">
                </div>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Address</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputCity">City</label>
                  <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">State</label>
                  <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputZip">Zip</label>
                  <input type="text" class="form-control" id="inputZip">
                </div>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success">Submit</button>
          </div>
        </div>
      </div>
    </div>
              
    <?php include('../layouts/footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>