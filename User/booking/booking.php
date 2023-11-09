<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='../css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='../booking/css/booking.css' />";

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

<?php
	
	// echo '<pre>';
	// print_r($_POST);


	if(isset($_POST['submit'])){

		$train_no = $_POST['train_no'];
		$train_num = $_POST['train_name'];
		$source = $_POST['from'];
		$dest = $_POST['to'];
		$class = $_POST['class'];
		$quota = $_POST['quota'];
		 
		   if(isset($_POST['g-recaptcha-response'])){
			$recaptcha=$_POST['g-recaptcha-response'];
			 if(!$recaptcha){
				echo '<script>alert("Please Check the RECAPTCHA BOX")</script>';
				exit;
	
			 }
			 else{
				$secret="6Lfx00ElAAAAAEVpeWdV5mTR66wfDsUjtNWVDpEw";
				$url='https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha;
				$response=file_get_contents($url);
				$responsekeys=json_decode($response,true);
				print_r($responsekeys,true);
				

				if($responsekeys['success'])
				{
					$query="insert into booking(train_no,train_name,source,dest,class,quota) 
		values ('$train_no','$train_num','$source','$dest','$class','$quota')";

		$bookresult = mysqli_query($con, $query);

		$user_id = $_SESSION['id'];
		// $row = mysqli_fetch_array($result);
		// print_r($result);

		for($i=0; $i<count($_POST['f_name']); $i++){
			$f_name = $_POST['f_name'][$i];
			$l_name = $_POST['l_name'][$i];
			$age = $_POST['age'][$i];
			$gender = $_POST['gender'][$i];
			$berth = $_POST['berth'][$i];
			$book_id = $bookresult;
			$phn=$_POST['phnum'][$i];

			$query = "insert into passengers(user_id,book_id,f_name,l_name,age,gender,berth,phn_no) values('$user_id','$book_id','$f_name','$l_name','$age','$gender','$berth','$phn')";
			$presult = mysqli_query($con, $query);


				}

			 }
		   }

		
		}


		//select query by newly add id
		$query = "select * from passengers where book_id = '$book_id'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
	}

	

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Online Railway Reservation System">
	<meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OR2S | Reservation</title>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/logo/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<header class="header">
		<div class="header" id="myHeader">
			<span class="logo"><a href="../index.php">
				<img src="/or2s/User/images/logo/or2s_black.png" width="150px">
			</a></span>
			<div class="menu" style="
    margin-left: 20px;">
				<ul>
					<li><a href="../index.php"><i class="fa fa-home"></i> HOME</a></li>
					<li><a href="../pages/about.php"><i class="fa fa-users"></i> ABOUT US</a></li>
					<li><a href="../pages/schedule.php"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="../booking/train-list.php"><i class="fa fa-ticket"></i> RESERVATION</a></li>
					<li><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="../pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>
				
					<li class="user">
						<?php if(isset($user_data['f_name'])) {
							echo '<li><a href="/or2s/User/booking/myticket.php" class=""><i class="fa fa-ticket"></i> MY TICKETS</a></li><li><i class="fa fa-user"></i><b> Welcome, </b>'.$user_data['f_name'].' '.$user_data['l_name'].'</li>';
						?>
					</li>
					<div class="logoutbtn">
						<li><a href="/or2s/User/auth/logout.php" class="logout"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
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
			<form action="/or2s/User/booking/myticket.php" method="POST">
			<div class="title">
					<div class="row">
						<div class="column">
							<button  class="chan" id="pd"><a href="/or2s/User/booking/bookticket.php?train_id=18004&train_name=Rani%20Shiromoni%20Express&arr_time=12:10:00.020000&dept_time=03:10:00.634000&date=2023-04-08&from=1&to=19&class=3&quota=3">1</a></button>
							<p id="pdl">Passenger Details</p>
						</div>
						<div class="column">
						    <button type="button"class="chan" id="rj">2</button> 
							<p id="rjl">Review Journey</p>
						</div>
						<div class="column">
						    <button  class="chan" id="pm"><a href="/or2s/User/payment/creditCard.php">3</a></button>
							<p id="pml">Payment</p>
						</div>
					</div>			
				</div>
				<div class="form-group">
					<div class="row">
						<div class="column">
							<label for="train_no">Train Number</label>
							<input id="train_no" name="train_no" value="<?php echo $_POST['train_no']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="train_name">Train Name</label>
							<input id="train_name" name="train_name" value="<?php echo $_POST['train_name']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="from">Source</label>
							<input id="from" name="from" value="<?php echo $_POST['from']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="to">Destination</label>
							<input id="to" name="to" value="<?php echo $_POST['to']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="class">Class</label>
							<input id="class" name="class" value="<?php echo $_POST['class']; ?>" class="disable">
						</div>
					</div>
					<div class="row" style="margin-bottom: 15px;">
						<div class="column">
							<label for="quota">Quota</label>
							<input id="quota" name="quota" value="<?php echo $_POST['quota']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="dept_time">Depurture Time</label>
							<input id="dept_time" name="dept_time" value="<?php echo $_POST['arr_time']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="arr_time">Arrival Time</label>
							<input id="arr_time" name="arr_time" value="<?php echo $_POST['dept_time']; ?>" class="disable">
						</div>
						<div class="column">
							<label for="date">Date of Booking</label>
							<input id="date" name="date" value="<?php echo $_POST['date']; ?>" class="disable">
						</div>
					</div>
					<div class="row" style="border-top: 3px solid #000;">
					<div id="note">
					•NOTE	</div>
					<div id="note">		
			• Review the details, for correction go back to the passenger details page. 
            </div>
			<div id="note1">
			• Click on the next button to move to the Payment Gateway.
            </div>
						<?php 
							if(isset($_POST)){

								for($i=1; $i<=$row; $i++){

									$f_name = $row['f_name'];
									$l_name = $row['l_name'];
									$age = $row['age'];
									$gender = $row['gender'];
									$berth = $row['berth'];

									$query = "select * from passengers limit 5";
									$result = mysqli_query($con, $query);
						?>
						<table>
							<thead>
								<tr>
									<th>Sl. No.</th>
									<th>First Name</th>
									<th>Last Name</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Berth Preference</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){
								?>
								<tr>
									<td><?php echo $i++ ?></td>

									<td><?php echo $row['f_name']; ?></td>

									<td><?php echo $row['l_name']; ?></td>

									<td><?php echo date('d-m-Y',strtotime($row['age'])); ?></td>

									<td>
									<?php 
										if($row['gender'] == 1){
											echo 'Male';
										}else if($row['gender'] == 2){
											echo 'Female';
										}else{
											echo 'Transgender';
										}
									?>
									</td>

									<td>
									<?php
										if($row['berth'] == 2){
											echo 'Lower Berth';
										}else if($row['berth'] == 3){
											echo 'Middle Berth';
										}else if(['berth'] == 4){

										
											echo 'Upper Berth';
										}
										else if(['berth'] == 5){
											echo 'Side Lower';
										}
										else{
											echo 'Side Upper';
										}
									?>
									</td>
								</tr>
								<?php 
										}
									}else{
										?>
											<tr>
												<td colspan="4"><center>NO RECORD FOUND !!</center></td>
											</tr>
										<?php
									}
								?>
							</tbody>
						</table>
						<?php 
							}
						} 
					?>
					</div>
					<!-- <div style="text-align: left;" >
						<p class="ticket-amount">Ticket Amount:</p> <p style="text-align: right;margin-top: -30px;">RS. 10.00</p>
						<p class="service-tax">Service Charges:</p><p style="text-align: right;margin-top: -30px;">(Including Service Tax) RS. 05.00</p>
						<p class="total-amount" style="text-align: right;border-top: 1px dotted; #000;">Total Amount: RS. 15.00</p>
						<p class="ticket-amount">Note: Please check all informations after payment!</p>
					</div> -->
				</div>
				<div class="g-recaptcha" data-sitekey="6Lfx00ElAAAAAC0hw_k2FO93cPtc0mc4TMvpXAav"></div>
				<style>
            .g-recaptcha {
              display: inline-block;
               }
              </style>

				<button style="float: right;"   class="form-btn"><a href="/or2s/User/payment/creditCard.php">Next</a></button>
			</form>
		</div>
		
    </section>
	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script type="text/javascript">
		window.onscroll = function() {myFunction()};

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