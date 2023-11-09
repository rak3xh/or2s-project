
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Online Railway Reservation System">
	<meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OR2S | Home</title>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/logo/favicon.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

</head>
<body>

	<header class="header">
		<div class="header" id="myHeader">
			<span class="logo" style="margin-top: 20px;"><a href="index.php">
				<img src="/or2s/User/images/logo/or2s_black.png" width="150px">
			</a></span>
			<div class="menu">
				<ul>
					<li><a href="index.php" class="active"><i class="fa fa-home"></i> HOME</a></li>
					<li><a href="pages/about.php"><i class="fa fa-users"></i> ABOUT US</a></li>
					<li><a href="pages/schedule.php"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="index.php"><i class="fa fa-table"></i> TRAIN LIST</a></li>
					<li><a href="pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>	
					
					<li class="user">
						<?php 
                        if(isset($user_data['f_name'])) {
							echo '<li><a href="/or2s/User/booking/myticket.php" class=""><i class="fa fa-ticket"></i> MY TICKETS</a></li><li><i class="fa fa-user"></i><b> Welcome, </b>'.$user_data['f_name']. ' '.$user_data['l_name'].'</li>';
						?>
					</li>
					<div class="logoutbtn">
						<li><a href="/or2s/User/auth/logout.php" class="logout"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
					</div>
					<?php }else { ?>
						<div class="button">
							<li><a href="auth/login.php" class="login"><i class="fa fa-sign-in"></i> LOGIN</a></li>
							<li><a href="auth/register.php" class="register"><i class="fa fa-user"></i> REGISTER</a></li>
						</div>
					<?php } ?>
				</ul>
			</div>
		</div>
	</header>
