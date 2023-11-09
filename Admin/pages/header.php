<?php 

?>
<div class="container-fluid bg-secondary menu sticky-top" style="background-color: blue !important;">
  <div class="row">
    <div class="col-sm-2">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php" style="font-size: 20px; font-weight: bold;"><h1><i>OR2S</i></h1></a>
        </li>
      </ul>
    </div>
    <div class="col-sm-6 mt-3">
        <ul class="nav">
          <li class="nav-item">
            <h4 class="text-light" style="position: relative;top: 8px;font-style: italic;">
              <?php date_default_timezone_set('Asia/Kolkata'); ?>
              <?php echo date("d-m-Y"); ?> <?php echo date("l"); ?> <?php echo date("h:i:s A"); ?> 
            </h3>
          </li>
      </ul>
    </div>
    <div class="col-sm-4 mt-3">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link " href="../auth/admin-profile.php" title="profile"><i class='fas fa-user'></i> Hi, Staff Admin
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../auth/logout.php" title="logout">Logout <i class='fas fa-sign-out-alt'></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>