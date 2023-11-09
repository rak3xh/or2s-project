<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='../css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='../booking/css/train-list.css' />";

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


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="description" content="Online Railway Reservation System">
	<meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OR2S | Train List</title>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/logo/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/or2s/User/css/footer.css" />
	<style>
		#google_translate_element select {
			background: #fff;
			color: maroon;
			border: 3px solid maroon;
			border-radius: 6px;
			margin-left: -1114px;

			width: 159px;
			padding: 6px 8px
		}

		.goog-logo-link {
			display: none !important;
		}

		.goog-te-gadget {
			color: transparent !important;
		}

		.goog-te-banner-frame {
			display: none !important;
		}

		#goog-gt-tt,
		.goog-te-balloon-frame {
			display: none !important;
		}

		.goog-text-highlight {
			background: none !important;
			box-shadow: none !important;
		}
	</style>
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
					<li><a href="#" class="active"><i class="fa fa-ticket"></i> TRAIN LIST</a></li>
					<li><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="../pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>

					<li class="user">
						<?php
						if (isset($user_data['f_name'])) {
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

	<main>
		<div class="form-container">

			<form action="" method="GET">
				<div class="form-group">
					<div id="google_translate_element"></div>
					<div class="row">
						<div class="column">
							<b>
								<font color="#000"><label id="showtrain" for="from">Source</label>
									<?php
									$query = "select ord,stop_code,stop_name from stops";
									$result = mysqli_query($con, $query);
									?>
									<select class="form-select" id="from" name="from">
										<?php
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_array($result)) {
												?>
												<option value="<?php echo $row['ord']; ?>"><?php echo $row['stop_code']; ?> -
													<?php echo $row['stop_name']; ?></option>
												<?php
											}
											?>
									</select>
									<?php
										}
										?>
						</div>
						<div class="column">
							<label id="showtrain" for="to">Destination</label>
							<?php
							$query = "select ord,stop_code,stop_name from stops";
							$result = mysqli_query($con, $query);
							?>
							<select class="form-select" id="to" name="to">
								<?php
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_array($result)) {
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
							<label id="showtrain" for="date">Date</label>
							<input type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
						</div>
						<div class="column">
							<label id="showtrain" for="class">Class</label>
							<?php
							$query = "select class_id,class_name from train_class limit 8";
							$result = mysqli_query($con, $query);
							?>
							<select class="form-select" id="class" name="class">
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
						<div class="column">
							<label id="showtrain" for="quota">Quota</label>
							<?php
							$query = "select quota_id,quota_name from train_quota limit 7";
							$result = mysqli_query($con, $query);
							?>
							<select class="form-select" id="quota" name="quota">
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
						<div class="column">
							<button type="submit" name="submit" class="searchBtn"><i
									class="fa fa-search"></i><b>Search</b></button>
						</div>
					</div>
					</b>

					<div class="row" id="second" style="border-top: 5px solid black;margin-top: 20px;">
						<div class="column">
							<label id="showtrain"><b>Show Trains</b></label>
							<select name="train" id="maxRows">
								<option value="5000">Show All</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="70">70</option>
								<option value="100">100</option>
							</select>
						</div>
					</div>

					<?php
					if (isset($_GET['from'])) {
						$query = "SELECT * FROM trains LEFT JOIN stops ON stops.stop_id = trains.id LEFT JOIN train_class ON train_class.class_id = trains.id LEFT JOIN train_quota ON train_quota.quota_id = trains.id LEFT JOIN timetable ON timetable.train_id = trains.id WHERE (schedule_from =" . $_GET['from'] . " AND schedule_to =" . $_GET['to'] . " OR schedule_from =" . $_GET['to'] . " AND schedule_to =" . $_GET['from'] . ")";

						if ($_GET['from'] == $_GET['to']) {
							echo '<p style="color: white;"><b>From Station and To Station are not be same. PLease select another!!!</b></p>';
						} else {
							$result = mysqli_query($con, $query);
						}

						$row = mysqli_fetch_array($result)

							// echo '<pre>';
							// print_r($row)
							// $result = mysqli_query($con, $query);
							?>


						<div class="row" style="overflow-x: scroll;">

							<table style="margin-top: 20px;" id="table-id">
								<thead>
									<tr>
										<th>Train Number</th>
										<th>Train Name</th>
										<th>Depurture Time</th>
										<th>Arrival Time</th>
										<th>Duration</th>
										<th>Distance</th>
										<th>Runs On</th>
										<th>Availability</th>
										<th>Book</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_array($result)) {
											?>

											<tr>
												<td>
													<?php echo $row['train_num']; ?>
												</td>
												<td>
													<?php echo $row['train_name']; ?>
												</td>
												<td>
													<?php echo date('H:i A', strtotime($row['arr_time'])); ?>
												</td>
												<td>
													<?php echo date('H:i A', strtotime($row['dept_time'])); ?>
												</td>
												<td>
													<?php echo $row['duration']; ?>
												</td>
												<td>
													<?php echo $row['distance'] . ' KM'; ?>
												</td>
												<td>
													<?php echo $row['days']; ?>
												</td>
												<td>
													<select class="available" id="available" required>
														<option value="" disabled selected hidden>Check</option>

														<option value="1">SL-0068</option>
														<option value="2">AC(3)-023</option>
														<option value="3">AC(2)-012</option>
														<option value="4">CC-W/L 23</option>
													</select>
												</td>

												<td>
													<a
														href="./bookTicket.php?train_id=<?php echo $row['train_num']; ?>&train_name=<?php echo $row['train_name']; ?>&arr_time=<?php echo $row['arr_time']; ?>&dept_time=<?php echo $row['dept_time']; ?>&date=<?php echo date('Y-m-d'); ?>&from=<?php echo $row['schedule_from']; ?>&to=<?php echo $row['schedule_to']; ?>&class=<?php echo $row['class_id']; ?>&quota=<?php echo $row['quota_id']; ?>">Book</a>
												</td>
											</tr>
											<?php
										}
									} else {
										?>
									<tr>
										<td colspan="11">
											<center>NO RECORD FOUND !!</center>
										</td>
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

				<div class='pagination-container'>
					<nav>
						<ul class="pagination">
							<li data-page="prev"><span>
									<font color="#fff">
										< Prev <span class="sr-only">(current)
								</span></span></li>
							<li data-page="next" id="prev"><span> Next > <span class="sr-only">(current)</span></span>
							</li>
							<font color="#000">
						</ul>
					</nav>
				</div>
			</form>
		</div>

	</main>
	<?php include("../footer.php"); ?>
	<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script src="/or2s/User/booking/js/translate.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
		$(document).ready(function () {
			const urlSearchParams = new URLSearchParams(window.location.search);
			const params = Object.fromEntries(urlSearchParams.entries());

			var myData = $('#from');
			var toData = $('#to');
			var classData = $('#class');
			var quotaData = $('#quota');

			myData.val(params.from);
			toData.val(params.to);
			classData.val(params.class);
			quotaData.val(params.quota);

			// console.log(params.from);
		});
	</script>

	<script type="text/javascript">
		getPagination('#table-id');

		function getPagination(table) {
			var lastPage = 1;
			$('#maxRows')
				.on('change', function (evt) {

					lastPage = 1;
					$('.pagination')
						.find('li')
						.slice(1, -1)
						.remove();
					var trnum = 0;
					var maxRows = parseInt($(this).val());

					if (maxRows == 5000) {
						$('.pagination').hide();
					} else {
						$('.pagination').show();
					}

					var totalRows = $(table + ' tbody tr').length;
					$(table + ' tr:gt(0)').each(function () {
						trnum++;
						if (trnum > maxRows) {

							$(this).hide();
						}
						if (trnum <= maxRows) {
							$(this).show();
						}
					});
					if (totalRows > maxRows) {
						var pagenum = Math.ceil(totalRows / maxRows);
						for (var i = 1; i <= pagenum;) {
							$('.pagination #prev')
								.before(
									'<li data-page="' +
									i +
									'">\
										  <span>' +
									i++ +
									'<span class="sr-only">(current)</span></span>\
										</li>'
								)
								.show();
						}
					}
					$('.pagination [data-page="1"]').addClass('active');
					$('.pagination li').on('click', function (evt) {
						evt.stopImmediatePropagation();
						evt.preventDefault();

						var pageNum = $(this).attr('data-page');

						var maxRows = parseInt($('#maxRows').val());

						if (pageNum == 'prev') {
							if (lastPage == 1) {
								return;
							}
							pageNum = --lastPage;
						}
						if (pageNum == 'next') {
							if (lastPage == $('.pagination li').length - 2) {
								return;
							}
							pageNum = ++lastPage;
						}

						lastPage = pageNum;
						var trIndex = 0;
						$('.pagination li').removeClass('active');
						$('.pagination [data-page="' + lastPage + '"]').addClass('active');
						limitPagging();
						$(table + ' tr:gt(0)').each(function () {
							trIndex++;
							if (
								trIndex > maxRows * pageNum ||
								trIndex <= maxRows * pageNum - maxRows
							) {
								$(this).hide();
							} else {
								$(this).show();
							}
						});
					});
					limitPagging();
				})
				.val(5)
				.change();
		}

		function limitPagging() {
			if ($('.pagination li').length > 7) {
				if ($('.pagination li.active').attr('data-page') <= 3) {
					$('.pagination li:gt(5)').hide();
					$('.pagination li:lt(5)').show();
					$('.pagination [data-page="next"]').show();
				} if ($('.pagination li.active').attr('data-page') > 3) {
					$('.pagination li:gt(0)').hide();
					$('.pagination [data-page="next"]').show();
					for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
						$('.pagination [data-page="' + i + '"]').show();
					}

				}
			}
		}

		$(function () {
			$('table tr:eq(0)').prepend('<th> Sl. No. </th>');
			var id = 0;
			$('table tr:gt(0)').each(function () {
				id++;
				$(this).prepend('<td>' + id + '</td>');
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
			$('#date').attr('min', maxDate);
		});
	</script>