<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");

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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Schedule</title>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/logo/favicon.png">
	<link rel="stylesheet" type="text/css" href="./css/pages.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />
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
					<li><a href="#" class="active"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="../index.php"><i class="fa fa-ticket"></i> TRAIN LIST</a></li>
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

    <main>
        <center>
            <div class="schedule">
				    <form action="" method="POST">
					    <h1 id="sche" style="margin-top: 0;">Train Schedule</h1>
                       	<input class="schd" type="text" id="train-box" name="getdata" autocomplete="off" required>
                        <input class="submitbtn" type="submit" id="search" value="Search" name="search">
                    </form>

				<?php 
					if(isset($_POST['search'])){
						$train_num = $_POST['getdata'];

						$query = "select * from trains left join timetable on timetable.train_id=trains.id where trains.train_num = '$train_num'";
						$result = mysqli_query($con, $query);
				?>

				<div style="margin-top: 10px;">
					<table>
						<thead>
							<tr>
								<th>Train Number</th>
								<th>Train Name</th>
								<th>Source</th>
								<th>Destination</th>
								<th>Runs On</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
							?>
							<tr>
								<td><?php echo $row['train_num']; ?></td>
								<td><b><?php echo $row['train_name']; ?></b></td>
								<td>
								<?php 
									if($row['schedule_from'] == 1){
										echo 'ADRA'; 
									}else if($row['schedule_from'] == 19){
										echo 'KGP'; 
									}
								?>
								</td>
								<td><?php 
									if($row['schedule_to'] == 1){
										echo 'ADRA'; 
									}else if($row['schedule_to'] == 19){
										echo 'KGP'; 
									}
								?>
								</td>
								<td><?php echo $row['days']; ?></td>
							</tr>
							<?php 
									}
								}else{
									?>
										<tr>
											<td colspan="6"><center>NO RECORD FOUND !!</center></td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
				<?php 
				} 
				?>


				<?php 
					if(isset($_POST['search'])){
						$data = $_POST['getdata'];
						$train_num = $_POST['getdata'];

						$query = "select * from trains where train_num = '$train_num'";
						$result = mysqli_query($con, $query);

						if(mysqli_num_rows($result) > 0){
							$row = mysqli_fetch_array($result);
						}

						$query = "select * from stops where division_id = ".$row['division_id']." and ord <> 0 order by ord" ;
						$result = mysqli_query($con, $query);

				?>
				<div style="margin-top: 10px;">
					<table>
						<thead>
							<tr>
								<th>Sl. No.</th>
								<th>Station Code</th>
								<th>Station Name</th>
								<th>Departure Time</th>
								<th>Arrival Time</th>
								<th>Distance (km)</th>
								<th>Division</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
							?>
							<tr>
								<td><?php echo $row['ord']; ?></td>
								<td><?php echo $row['stop_code']; ?></td>
								<td><?php echo $row['stop_name']; ?></td>
								<td><?php echo '06:00 AM'; ?></td>
								<td><?php echo '09:00 AM'; ?></td>
								<td><?php echo '168 KM'; ?></td>
								<td><?php echo $row['division_id']; ?></td>
							</tr>
							<?php 
									}
								}else{
									?>
										<tr>
											<td colspan="6"><center>NO RECORD FOUND !!</center></td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
				<?php 
				} 
				?>

			</div>
        </center>
    </main>
<script src="../pages/js/jquery.min.js"></script>
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

</body>
</html>