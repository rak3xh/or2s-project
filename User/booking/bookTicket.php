<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='../css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='../booking/css/book-ticket.css' />";

$user_data = [];
if (isset($_SESSION['id'])) {
	$query = "select * from users where id = " . $_SESSION['id'];
	$result = mysqli_query($con, $query);

	if ($result) {
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);
		}
	}
} else {
	header("Location: /OR2S/User/auth/login.php");
	exit();
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="Online Railway Reservation System">
	<meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OR2S | Add Ticket</title>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/logo/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
		integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="/or2s/User/css/footer.css" />

</head>

<body>
	<header class="header">
		<div class="header" id="myHeader">
			<span class="logo"><a href="../index.php">
					<img src="/or2s/User/images/logo/or2s_black.png" width="150px">
				</a></span>
			<div class="menu">
				<ul>
					<li><a href="../index.php"><i class="fa fa-home"></i> HOME</a></li>
					<li><a href="../pages/about.php"><i class="fa fa-users"></i> ABOUT US</a></li>
					<li><a href="../pages/schedule.php"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="../booking/train-list.php"><i class="fa fa-ticket"></i> RESERVATION</a></li>
					<li><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="../pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>

					<li class="user">
						<?php if (isset($user_data['f_name'])) {
							echo '<li><a href="/or2s/User/booking/myticket.php" class=""><i class="fa fa-ticket"></i> MY TICKETS</a></li><li><i class="fa fa-user"></i><b> Welcome, </b>' . $user_data['f_name'] . ' ' . $user_data['l_name'] . '</li>';
							?>
						</li>
						<div class="logoutbtn">
							<li><a href="/or2s/User/auth/logout.php" class="logout"><i class="fa fa-sign-out"></i>
									LOGOUT</a></li>
						</div>
					<?php } else { ?>
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
			<form action="/or2s/User/booking/booking.php" method="POST">
				<div class="title">
					<div class="row">
						<div class="column">
							<button type="button" class="chan" id="pd">1</button>
							<p id="pdl">Passenger Details</p>
						</div>
						<div class="column">
							<button type="button" class="chan" id="rj">2</button>
							<p id="rjl">Review Journey</p>
						</div>
						<div class="column">
							<button type="button" class="chan" id="pm">3</button>
							<p id="pml">Payment</p>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="column">
							<label for="train_no">Train Number</label>
							<input id="train_no" name="train_no" value="<?php echo $_GET['train_id']; ?>"
								class="disable">
						</div>
						<div class="column">
							<label for="train_name">Train Name</label>
							<input id="train_name" name="train_name" value="<?php echo $_GET['train_name']; ?>"
								class="disable">
						</div>
						<div class="column">
							<?php

							if (isset($_GET['from'])) {
								$query = "select * from trains join stops on trains.schedule_from = stops.ord where schedule_from = " . $_GET['from'] . " ";
								$result = mysqli_query($con, $query);

								$row = mysqli_fetch_array($result);

								?>
								<label for="from">From Station</label>
								<input id="from" name="from" value="<?php echo $row['stop_code']; ?>" class="disable">

								<?php

							}

							?>
						</div>
						<div class="column">
							<?php

							if (isset($_GET['to'])) {
								$query = "select * from trains join stops on trains.schedule_to = stops.ord where schedule_to = " . $_GET['to'] . " ";
								$result = mysqli_query($con, $query);

								$row = mysqli_fetch_array($result);

								?>
								<label for="to">To Station</label>
								<input id="to" name="to" value="<?php echo $row['stop_code']; ?>" class="disable">
								<?php

							}

							?>
						</div>
						<div class="column">
							<?php
							if (isset($_GET['class'])) {
								$query = "select * from train_class where class_id = " . $_GET['class'] . " ";
								$result = mysqli_query($con, $query);

								$row = mysqli_fetch_array($result);
								?>
								<label for="class">Class</label>
								<input id="class" name="class" value="<?php echo $row['class_name']; ?>" class="disable">
								<?php

							}

							?>
						</div>
					</div>
					<div class="row" style="margin-bottom: 15px;">
						<div class="column">
							<?php
							if (isset($_GET['quota'])) {
								$query = "select * from train_quota where quota_id = " . $_GET['quota'] . " ";
								$result = mysqli_query($con, $query);

								$row = mysqli_fetch_array($result);
								?>
								<label for="quota">Quota</label>
								<input id="quota" name="quota" value="<?php echo $row['quota_name']; ?>" class="disable">
								<?php

							}

							?>
						</div>
						<div class="column">
							<label for="arr_time">Depurture Time</label>
							<input id="arr_time" name="arr_time"
								value="<?php echo date('H:i A', strtotime($_GET['arr_time'])); ?>" class="disable">
						</div>
						<div class="column">
							<label for="dept_time">Arrival Time</label>
							<input id="dept_time" name="dept_time"
								value="<?php echo date('H:i A', strtotime($_GET['dept_time'])); ?>" class="disable">
						</div>
						<div class="column">
							<label for="date">Date of Booking</label>
							<input id="date" name="date" value="<?php echo date('d-m-Y', strtotime($_GET['date'])); ?>"
								class="disable">
						</div>
					</div>
					<div id="note">
						•NOTE </div>
					<div id="note">
						• Fill the Full Name(No Intials).
					</div>
					<div id="note1">
						• Pasengers need to carry their original Govt. ID card.
					</div>
					<div class="row">
						<table id="passenger">
							<thead>
								<tr>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Berth Preference</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<tr class="pdetails">
									<td><input type="name" id="f_name" name="f_name[]" required></td>
									<td><input type="name" id="l_name" name="l_name[]" required></td>
									<td><input type="text" id="age" name="age[]" required></td>
									<td style="width: 150px;">
										<select name="gender[]" id="gender" class="form-select" required>
											<option value="1">Male</option>
											<option value="2">Female</option>
											<option value="3">Transgender</option>
										</select>
									</td>
									<td style="width: 210px;">
										<?php
										$query = "select id,name from berth";
										$result = mysqli_query($con, $query);
										?>
										<select class="form-select" id="berth" name="berth[]" required>
											<option value="">--SELECT--</option>

											<?php
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_array($result)) {
													?>
													<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?>
													</option>
													<?php
												}
												?>
										</select>
										<?php
											}
											?>
									</td>
									<td>
										<button class="removeBtn"><i class="fa fa-xmark"></i> Remove</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<h1>
				</h1>
				<div class="row" style="margin-bottom: 15px;">
					<div class="column">
						<button id="addPerson" class="addPerson"><i class="fa fa-plus"></i> Add Person/Add Infant with
							Berth</button>
					</div>
					<div class="column">
						<button id="addPerson1" class="addPerson"><i class="fa fa-plus"></i> Add Infant without
							Berth</button>
					</div>
				</div>
				<div class="detail">
					<h1>Contact Details</h1>
					<label id="contact" for="phnum">Enter the Contact Number of the Passenger</label>
					<input type="number" id="phnum" class="form-select" name="phnum" maxlength="10" required>
				</div>
				<div class="fare">
					<table id="fare">
						<button style="float: right;" type="submit" id="submit" name="submit"
							class="form-btn">Next</button>
						<button style="float: right;" class="form-btn"><a href="../index.php">Cancel</a></button>
						<thread>
							<tr id="price">
								<th>Fare Summary</th>
								<th>Price (in INR)</th>
							</tr>
						</thread>
						<tbody>
							<tr>
								<td>Ticket Fare</td>
								<td>500</td>
							</tr>
							<tr>
								<td>Total Fare</td>
								<td>500</td>
							</tr>
						</tbody>
						<tbody>
					</table>


				</div>
				<div class="g-recaptcha" data-sitekey="6Lfx00ElAAAAAC0hw_k2FO93cPtc0mc4TMvpXAav"></div>

				<style>
					.g-recaptcha {
						display: inline-block;
						margin-left: 350px;
						border: 3px solid black;
						margin-top: -85px;
					}
				</style>

			</form>
		</div>
		<?php include("../footer.php"); ?>

	</section>


	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


	<script type="text/javascript">
		window.onscroll = function () { myFunction() };

		var header = document.getElementById("myHeader");

		var sticky = header.offsetTop;

		function myFunction() {
			if (window.pageYOffset > sticky) {
				header.classList.add("sticky");
			} else {
				header.classList.remove("sticky");
			}
		}
	</script>

	<script>
		$(document).ready(function () {
			$("#addPerson").click(function (e) {
				e.preventDefault();
				var count = $('.pdetails').length;
				if (count < 5) {
					$("#passenger").append('<tr class="pdetails"><td><input type="name" id="f_name" name="f_name[]" fdprocessedid="cbl9i"></td><td><input type="name" id="l_name" name="l_name[]"></td><td><input type="date" id="age" name="age[]"></td><td><select name="gender[]" id="gender" class="form-select" fdprocessedid="2proex"><option value="1">Male</option><option value="2">Female</option></select></td><td><select class="form-select" id="berth" name="berth[]" fdprocessedid="th3f2"><option value="1">Lower Berth</option><option value="2">Middle Berth</option><option value="3">Upper berth</option></select></td><td><button class="removeBtn" fdprocessedid="bnooyj"><i class="fa fa-xmark"></i> Remove</button></td></tr>');
				} else {
					alert("Already Add Five Tickets!!!");
				}
				// console.log(count);

			});

			$(document).on("click", ".removeBtn", function () {
				$(this).closest('.pdetails').remove();
			});
		});

	</script>
	<script>
		$(document).ready(function () {
			$("#addPerson1").click(function (e) {
				e.preventDefault();
				var count = $('.pdetails').length;
				if (count < 5) {
					$("#passenger").append('<tr class="pdetails"><td><input type="name" id="f_name" name="f_name[]" fdprocessedid="cbl9i"></td><td><input type="name" id="l_name" name="l_name[]"></td><td><input type="date" id="age" name="age[]"></td><td><select name="gender[]" id="gender" class="form-select" fdprocessedid="2proex"><option value="1">Male</option><option value="2">Female</option></select></td><td><select class="form-select" id="berth" name="berth[]" fdprocessedid="th3f2"><option value="1">Lower Berth</option><option value="2">Middle Berth</option><option value="3">Upper berth</option></select></td><td><button class="removeBtn" fdprocessedid="bnooyj"><i class="fa fa-xmark"></i> Remove</button></td></tr>');
				} else {
					alert("Already Add Five Tickets!!!");
				}
				// console.log(count);

			});

			$(document).on("click", ".removeBtn", function () {
				$(this).closest('.pdetails').remove();
			});
		});

	</script>
	<script type="text/javascript">
		$(function () {
			var dtToday = new Date();
			var month = dtToday.getMonth() + 1;
			var day = dtToday.getDate();
			var year = dtToday.getFullYear();
			if (month < 10)
				month = '0' + month.toString();
			if (day < 10)
				day = '0' + day.toString();
			var maxDate = year + '-' + month + '-' + day;
			$('#age').attr('max', maxDate);
		});
	</script>