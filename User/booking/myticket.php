<?php
session_start();
include("../db/connection.php");
include("../db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='../css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='../booking/css/tickets.css' />";

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
	$query = "SELECT * FROM trains LEFT JOIN stops ON stops.stop_id = trains.id LEFT JOIN train_class ON train_class.class_id = trains.id LEFT JOIN train_quota ON train_quota.quota_id = trains.id LEFT JOIN timetable ON timetable.train_id = trains.id";
		
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Online Railway Reservation System">
	<meta name="keywords" content="HTML, CSS, JavaScript, PHP, MySQL">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OR2S | Tickets</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
	<header class="header">
		<div class="header" id="myHeader">
			<span class="logo" style="margin-top: 20px;"><a href="../index.php">
				<img src="/or2s/User/images/logo/or2s_black.png" width="150px">
			</a></span>
			<div class="menu">
				<ul>
					<li><a href="../index.php"><i class="fa fa-home"></i> HOME</a></li>
					<li><a href="../pages/about.php"><i class="fa fa-users"></i> ABOUT US</a></li>
					<li><a href="../pages/schedule.php"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="../index.php"><i class="fa fa-ticket"></i> RESERVATION</a></li>
					<li><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="../pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>
				
					<li class="user">
						<?php if(isset($user_data['f_name'])) {
							echo '<span><i class="fa fa-user"></i><b> Welcome, </b>'.$user_data['f_name'].' '.$user_data['l_name'].'</span>';
						?>
					</li>
					<li><a href="#" class="active"><i class="fa fa-user"></i> MY TICKETS</a></li>
					<div class="logoutbtn">
						<li><a href="../or2s/auth/logout.php" class="logout"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
					</div>
					<?php }else { ?>
						<div class="button">
							<li><a href="../auth/slogin.php" class="slogin"><i class="fa fa-lock"></i> STAFF LOGIN</a></li>
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
			<form action="" method="GET">
				<div class="title"><h3>Tickets</h3></div>
				<div class="form-group">
					<div class="row">
						<div class="pageNum">
							<select name="state" id="maxRows">
								<option value="5000">Show All</option>
								<option value="2">2</option>
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="15">15</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="70">70</option>
								<option value="100">100</option>
							</select>
						</div>
						<button style="float: right;margin-top: 10px;" class="form-btn"><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> Check PNR</a></button>
					</div>
					<div class="row" style="overflow-x: scroll;">
						<?php 
							if(isset($_GET)){
								$query = "select * from passengers join booking on booking.id=passengers.p_id";
								$result = mysqli_query($con, $query);
						?>
						<table id= "table-id">
							<thead>
								<tr>
									<th>Booking ID</th>
									<th>PNR Number</th>
									<th>Name</th>
									<th>Age</th>
									<th>Gender</th>
									<th>Berth Preference</th>
									<th>Train</th>
									<th>From Station</th>
									<th>To Station</th>
									<th>Class</th>
									<th>Quota</th>
									<th>Journey Date</th>
									<th>Seat No</th>
									<th>Status</th>
									<th>Print</th>
									
								</tr>
							</thead>
							<tbody>
								<?php 
									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){
								?>
								<tr>
									<td><?php echo $row['book_id']; ?></td>
									<td><?php echo $row['p_id']; ; ?></td>
									<td><?php echo $row['f_name']; ?> <?php echo $row['l_name']; ?></td>
									<td><?php echo '22'; ?></td>
									<td>
									<?php 
										if($row['gender'] == 1){
											echo 'Male';
										}else if($row['gender']==2){
											echo 'Female';
										}
										else{
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
										}else if($row['berth'] == 4){
											echo 'Upper Berth';
										}
										else if($row['berth'] == 5){
											echo 'Side Upper Berth';
										}
										else{
											echo 'Side Lower Berth';
										}
									?>
									</td>
									<td><?php echo $row['train_no']; ?></td>
									<td><?php echo 'Adra Junction(ADRA)'; ?></td>
									<td><?php echo 'Khargapur(KGP)'; ?></td>
									<td><?php echo $row['class']; ?></td>
									<td><?php echo 'General'; ?></td>
									<td><?php echo date('Y-m-d'); ?></td>
									<td><?php echo $row['seat_no']; ?></td>
									<td style="background: green;color: #fff;"><b>Confirmed (CNF)</b></td>
									<td>
										<button class="printBtn"><a target="_blank" href="/or2s/User/booking/train-ticket.php">Check Ticket</a></button>
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
					?>
					</div>
				</div>

				<div class='pagination-container' >
					<nav>
					  <ul class="pagination">
			    		<li data-page="prev" ><span> < Prev <span class="sr-only">(current)</span></span></li>
						<li data-page="next" id="prev"><span> Next > <span class="sr-only">(current)</span></span></li>
					  </ul>
					</nav>
				</div>

			</form>
		</div>
		
    </section>

    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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

	<script type="text/javascript">
		getPagination('#table-id');

		function getPagination(table) {
		  var lastPage = 1;
		  $('#maxRows')
		    .on('change', function(evt) {

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
		      $(table + ' tr:gt(0)').each(function() {
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
		        for (var i = 1; i <= pagenum; ) {
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
		      $('.pagination li').on('click', function(evt) {
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
		        $(table + ' tr:gt(0)').each(function() {
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
		    .val(2)
		    .change();
		}

		function limitPagging(){
			if($('.pagination li').length > 7 ){
					if( $('.pagination li.active').attr('data-page') <= 3 ){
					$('.pagination li:gt(5)').hide();
					$('.pagination li:lt(5)').show();
					$('.pagination [data-page="next"]').show();
				}if ($('.pagination li.active').attr('data-page') > 3){
					$('.pagination li:gt(0)').hide();
					$('.pagination [data-page="next"]').show();
					for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
						$('.pagination [data-page="'+i+'"]').show();
					}

				}
			}
		}

		$(function() {
		  $('table tr:eq(0)').prepend('<th> Sl. No. </th>');
		  var id = 0;
		  $('table tr:gt(0)').each(function() {
		    id++;
		    $(this).prepend('<td>' + id + '</td>');
		  });
		});

	</script>