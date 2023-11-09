<div class="container-fluid bg-secondary menu sticky-top" 
style="background-color: #7e2525 !important;border-bottom-right-radius: 30px;border-bottom: 10px solid gray;border-top: 10px solid gray">
  <div class="row">
    <div class="col-sm-2">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <img src="../../User/images/logo/or2s_white.png" height="100%" width="100%"
            style="margin-left: -20px;"
            />
          </a>
        </li>
      </ul>
    </div>
    <div class="col-sm-4 mt-3">
        <ul class="nav">
          <li class="nav-item">
            <p class="text-light" style="position: relative;top: 0px;font-style: italic;">
              <?php date_default_timezone_set('Asia/Kolkata'); ?>
              <?php echo date("l"); ?>, <?php echo date("d/m/Y"); ?>, <?php echo date("h:i:s A"); ?> 
            </p>
          </li>
      </ul>
    </div>
    <div class="col-sm-2 mt-3">
        <ul class="nav">
          <li class="nav-item">
            <h3 class="text-light" style="position: relative;top: 0px;">
              <b><i>Admin Panel</i></b>
            </h3>
          </li>
      </ul>
    </div>
    <div class="col-sm-4 mt-1">
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-link " href="../auth/admin-profile.php" title="profile" style="font-style:italic;">
          <i class='fas fa-user'></i> Hi, Krishnendu Nanda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../auth/logout.php" class="logoutBtn" style="font-style:italic;background-color: #ffc107;color:#000;border-radius: 20px;">
          <i class='fas fa-sign-out-alt'></i> Sign Out
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>