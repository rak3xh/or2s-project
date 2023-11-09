<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='../css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='../booking/css/train-ticket.css' />";

	$user_data = [];
	if(isset($_SESSION['id'])){
		$query = "select * from users where id = ".$_SESSION['id'];
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
		$source = $_POST['from'];
		$dest = $_POST['to'];
		$class = $_POST['class'];
		$quota = $_POST['quota'];
		$dept_time = $_POST['arr_time'];
		$arr_time = $_POST['dept_time'];

		$query = "select * from passengers join booking on booking.id=passengers.p_id";
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
	<title>OR2S | Ticket</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <section>
    	<div class="form-container">
			<form action="" method="GET">	
				<div class="title"><h3>Congratulations! You have successfully booked your Ticket</h3></div>
				<div class="form-group">

					<div class="ticket-details" id="ticket">
						<div class="row" style="margin-top: 20px;">
							
							<table>
								<tbody>
									<tr>
										<td style="width: 500px;">
											<div class="pnr">
												<b>PNR: 01</b>
											</div>
										</td>
										<td style="width: 500px;"><h3><b>R, Mondal, K Nanda</b></h3></td>
										<td style="width: 500px;">
											<div class="booking-id">
												<b>BOOKING ID: 01</b>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row train">
							<table>
								<thead>
									<tr>
										<th>Train No.</th>
										<th>Date</th>
										<th>Class</th>
										<th>Quota</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>18004</td>
										<td>10-04-23</td>
										<td>AC First Class (1AC)</td>
										<td>General</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="train-name">
							<img src="/or2s/User/images/logo/or2s_white.png" width="150px" style="margin-top: 20px;">
							<h4>RANI SHIROMONI SF EXPRESS (18004)</h4>
						</div>
						<div class="row">
							<table>
								<thead>
									<tr>
										<th>Depurture Time</th>
										<th>From Station</th>
										<th>Distance</th>
										<th>To Station</th>
										<th>Arrival Time</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>10:00 AM</td>
										<td>ADRA</td>
										<td>197 KM</td>
										<td>KGP</td>
										<td>01:00 PM</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="row passenger">
							<table>
								<thead>
									<tr>
										<th>Age</th>
										<th>Gender</th>
										<th>Berth</th>
										<th>Seat No.</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>22</td>
										<td>MALE</td>
										<td>SIDE LOWER, LOWER BERTH</td>
										<td>23, 24</td>
										<td>CNF</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="pdf">
						<img src="https://chart.googleapis.com/chart?cht=qr&chl=OR2S&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive" height="200px">
						<div>
							<button class="printBtn" onclick="printDiv('ticket')" >Print Ticket</button>
							<button class="returnBtn"><a href="./myticket.php">Check History</a></button>
						</div>
					</div>

				</div>
			</form>
		</div>
    </section>

    <script type="text/javascript">
    	function printDiv(divName) {
		     var printContents = document.getElementById(divName).innerHTML;
		     var originalContents = document.body.innerHTML;

		     document.body.innerHTML = printContents;

		     window.print();

		     document.body.innerHTML = originalContents;
		}
    </script>

    <script>
//     function htmlEncode(value) {
//       return $('<div/>').text(value)
//         .html();
//     }
 
//     $(function () {
//       $('#generate').click(function () {
//         let finalURL =
// 'https://chart.googleapis.com/chart?cht=qr&chl=' +
//           htmlEncode($('#content').val()) +
//           '&chs=160x160&chld=L|0'
//         $('.qr-code').attr('src', finalURL);
//       });
//     });
  </script>