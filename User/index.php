<?php
session_start();
include("./db/connection.php");
include("./db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='./css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='./css/style.css' />";





$user_data = [];
if (isset($_SESSION['id'])) {
	$query = "select f_name,l_name from users where id = " . $_SESSION['id'];
	$result = mysqli_query($con, $query);

	if ($result) {
		if ($result && mysqli_num_rows($result) > 0) {
			$user_data = mysqli_fetch_assoc($result);

		}
	}
}

?>

<?php include("./header.php"); ?>

<head>
	<link rel="stylesheet" type="text/css" href="/or2s/User/css/footer.css" />

	<style>
		#google_translate_element {
			margin-left: 34px;
			padding: 1px;
		}

		#language {
			color: white;
			position: absolute;
			margin-left: 9px;
			margin-top: 6px;

		}
	</style>
</head>

<main>

	<section class="banner homeImage">
		<i class="fas fa-language" id="language"></i>
		<div id="google_translate_element"></div>


		<div class="form-container">
			<form action="/or2s/User/booking/train-list.php" method="GET">
				<h3><a target="_blank" rel="noopener" href="https://amritmahotsav.nic.in/"><img id="azadi"
							src="/or2s/User/images/azadi.png" width="90px"></a></i><b> Find Train </b></i></h3>
				<div id="tnd" style=""><b>
						<?php
						date_default_timezone_set('Asia/Kolkata');
						echo date('d-m-Y' . " " . 'l' . " " . 'h:i:s A');
						?>
					</b>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="column">
							<meta charset="UTF-8">

							<script src="https://code.responsivevoice.org/responsivevoice.js?key=YOUR_API_KEY"></script>


							</head>

							<body>

								<div class="search-container">
									<button id="speech-button" type="button" style="float: right"><i
											class="fas fa-microphone"></i></button>
									<label for="from">Know the Spelling of the STATION</label>
									<input type="text" id="search-box">

								</div>
								<div id="search-results"></div>
								<script src="recog.js"></script>
								<label for="from">Source Station

								</label>
								<?php

								$query = "select ord,stop_code,stop_name from stops";
								$from = mysqli_query($con, $query);

								?>
								<select class="form-select select1" id="from" name="from" placeholder="from" required>

									<option value="" disabled selected></option>
									<?php
									if (mysqli_num_rows($from) > 0) {
										while ($row = mysqli_fetch_array($from)) {
											?>
											<option value="<?php echo $row['ord']; ?>"><?php echo $row['stop_code']; ?> - <?php echo $row['stop_name']; ?></option>
											<?php
										}
										?>
								</select>
								<?php
									}
									?>
						</div>
						<div class="column">
							<label for="to">Destination Staion</label>
							<?php
							$query = "select ord,stop_code,stop_name from stops";
							$to = mysqli_query($con, $query);
							?>
							<select class="form-select select2" id="to" name="to" placeholder="To" required>
								<option value="" disabled selected></option>
								<?php
								if (mysqli_num_rows($to) > 0) {
									while ($row = mysqli_fetch_array($to)) {
										?>
										<option value="<?php echo $row['ord']; ?>"><?php echo $row['stop_code']; ?> - <?php echo $row['stop_name']; ?></option>
										<?php
									}
									?>
							</select>
							<?php
								}
								?>
						</div>
					</div>
					<div class="row">
						<div class="column" style="width: 50%;">
							<label for="date">Date</label>
							<input type="date" value="<?php echo date('Y-m-d'); ?>" id="inputdate" name="inputdate"
								required>

							<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
						</div>
						<div class="column" style="width: 50%;">
							<label for="class">Class</label>
							<?php
							$query = "select class_id,class_name from train_class limit 8";
							$result = mysqli_query($con, $query);
							?>
							<select class="form-select" id="class" name="class" placeholder="class" required>
								<option value="" disabled selected></option>
								<?php
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result)) {
										?>
										<option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?>
										</option>
										<?php
									}
									?>
							</select>
							<?php
								}
								?>
						</div>
					</div>
					<div class="row">
						<div class="column" style="width: 50%;">
							<label for="quota">Quota</label>
							<?php
							$query = "select quota_id,quota_name from train_quota limit 7";
							$result = mysqli_query($con, $query);
							?>
							<select class="form-select" id="quota" name="quota" placeholder="quota" required>
								<option value="" disabled selected></option>
								<?php
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result)) {
										?>

										<option value="<?php echo $row['quota_id']; ?>"><?php echo $row['quota_name']; ?>
										</option>
										<?php
									}
									?>
							</select>
							<?php
								}
								?>
						</div>
					</div>

				</div>
				<button style="width: 20%;" type="reset" id="resetBtn" name="reset">
					<i class="fa fa-rotate-right"></i> Reset
					<button style="width: 70%;" type="submit" id="searchBtn" name="submit" class="form-btn">
						<i class="fa fa-search"></i> Check Availability
					</button>
			</form>
		</div>
	</section>
</main>



<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="script.js"></script>

<?php include("footer.php"); ?>

<script src="js/jquery.min.js"></script>

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
		$('#inputdate').attr('min', maxDate);
	});
</script>