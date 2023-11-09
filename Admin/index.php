<?php

session_start();
$email_address= !empty($_SESSION['email'])?$_SESSION['email']:'';
if(!empty($email_address))
{
  header("location:view/dashboard.php");
}
include("../User/db/connection.php");
include('auth/admin-login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>OR2S | Admin Login</title>
  <link rel="icon" type="image/x-icon" href="../Admin/assets/images/favicon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="form-container">  
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <i class="fa fa-user" style="font-size: 100px;color:#645CBB;"></i>
    <!-- <img src="../Admin/assets/images/favicon.png" width="100px" height="100px"/> -->
    <h3>Admin Login</h3>
    <div class="form-group">
      <div class="row">
        <div class="column">
          <label>Enter Unique ID:</label>
          <input type="text" class="form-control" value="" disabled>
        </div>
        <div class="column">
          <label>Email:</label>
          <input type="text" class="form-control"  placeholder="Enter Email" name="email" value="<?php echo $set_email; ?>">
        </div>
        <div class="column">
          <label>Password:</label>
            <input type="password" class="form-control"  placeholder="Enter Password" name="password">
        </div>
      </div>
    </div>
    <button type="submit" name="login" class="form-btn"><i class="fa fa-sign-in"></i> <b>Sign In</b></button>
    <p type="submit">Back to <a href="../User/index.php"><i class="fa fa-home"></i><b>Website</b></a></p>
  </form>
</div>

</body>
</html>