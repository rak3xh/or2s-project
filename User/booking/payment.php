<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='../css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='../booking/css/payment.css' />";

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
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Online Railway Reservation System">
	<meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OR2S | Book</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<header class="header">
		<div class="header" id="myHeader">
			<span class="logo"><a href="../index.php">OR2S</a></span>
			<div class="menu">
				<ul>
					<li><a href="../index.php"><i class="fa fa-home"></i> HOME</a></li>
					<li><a href="../pages/about.php"><i class="fa fa-users"></i> ABOUT US</a></li>
					<li><a href="../pages/schedule.php"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="../booking/train-list.php"><i class="fa fa-ticket"></i> RESERVATION</a></li>
					<li><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="../pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>
				
					<li class="user">
						<?php if(isset($user_data['f_name'])) {
							echo '<span><i class="fa fa-user"></i><b> Welcome, </b>'.$user_data['f_name'].' '.$user_data['l_name'].'</span>';
						?>
					</li>
					<div class="logoutbtn">
						<li><a href="../or2s/auth/logout.php" class="logout"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
					</div>
					<?php }else { ?>
						<div class="button">
							<li><a href="../auth/login.php" class="login"><i class="fa fa-sign-in"></i> LOGIN</a></li>
							<li><a href="../auth/register.php" class="register"><i class="fa fa-user"></i> REGISTER</a></li>
						</div>
					<?php } ?>
				</ul>
			</div>
		</div>
	</header>

    <section>
    	<div class="form-container">
			<form action="" method="POST">
				<h3>Make Payment</h3>
				<div class="form-group">
					<div class="row" style="margin-bottom: 15px;">
						<p style="text-align: left; border: 1px solid blue;padding: 5px;background-color: blue;color: #fff;">Select your payment option.</p>
						<div class="column" style="width: 33% !important;">
							<input type="radio" name="paymethod" id="upi" value="UPI" style="margin-left: 10px;">
							<label for="upi" style="margin-top: -16px;">BHIM/UPI</label>
						</div>
						<div class="column" style="width: 33% !important;">
							<input type="radio" name="paymethod" id="upi" value="UPI" style="margin-left: 35px;">
							<label for="upi" style="margin-top: -16px;">DEBIT CARD</label>
						</div>
						<div class="column" style="width: 33% !important;">
							<input type="radio" name="paymethod" id="upi" value="UPI" style="margin-left: 40px;">
							<label for="upi" style="margin-top: -16px;">CREDIT CARD</label>
						</div>
					</div>

					<div>
						<div class="row" style="margin-bottom: 15px;">
							<p style="text-align: left; border: 1px solid blue;padding: 5px;background-color: blue;color: #fff;">Pay with UPI</p>
							<img src="../images/payments/paytm_logo.jpeg"  style="width: 70px;cursor: pointer;">
							<img src="../images/payments/gpay_logo.jpeg" style="width: 150px;cursor: pointer;">
							<img src="../images/payments/phonepe_logo.jpeg"  style="width: 80px;cursor: pointer;">
							<img src="../images/payments/amazon_logo.jpeg" style="width: 140px;cursor: pointer;">
						</div>
						<div class="row" style="margin-bottom: 15px;">
							<img src="../images/payments/paytm.jpeg" height="200px" > 
						</div>
					</div>

					<div>
						<div class="row" style="margin-bottom: 10px;">
							<p style="text-align: left; border: 1px solid blue;padding: 5px;background-color: blue;color: #fff;">Pay with Debit Card</p>
							<div class="column">
								<label for="f_name">DEBIT CARD HOLDER'S NAME</label>
								<input type="name" id="f_name" name="f_name" value="">
							</div>
							<div class="column">
								<label for="f_name">DEBIT CARD NUMBER</label>
								<input type="name" id="f_name" name="f_name" value="">
							</div>
							<div class="column">
								<label for="m_name">CVV CODE</label>
								<input type="name" id="m_name" name="m_name" value="">
							</div>
							<div class="column">
								<label for="date">EXPIRY DATE</label>
								<input type="date" id="date" name="date" value="">
							</div>
						</div>
					</div>

					<div>
						<div class="row" style="margin-bottom: 10px;">
							<p style="text-align: left; border: 1px solid blue;padding: 5px;background-color: blue;color: #fff;">Pay with Credit Card</p>
							<div class="column">
								<label for="f_name">CREDIT CARD HOLDER'S NAME</label>
								<input type="name" id="f_name" name="f_name" value="">
							</div>
							<div class="column">
								<label for="f_name">CREDIT CARD NUMBER</label>
								<input type="name" id="f_name" name="f_name" value="">
							</div>
							<div class="column">
								<label for="m_name">CVV CODE</label>
								<input type="name" id="m_name" name="m_name" value="">
							</div>
							<div class="column">
								<label for="date">EXPIRY DATE</label>
								<input type="date" id="date" name="date" value="">
							</div>
						</div>
					</div>

					<button style="float: right;margin-bottom: 10px;" type="submit" class="form-btn"><a href="./booking.php">Back</a></button>
					<button type="submit" class="form-btn" style="width: 100%;" disabled><a href=""><b>Total Amount: 1000.00/-</b>	</a></button>
				</div>
				<button type="submit" class="form-btn" style="width: 100%;"><a href="">Proceed to Pay</a></button>

				
			</form>
		</div>
		
    </section>