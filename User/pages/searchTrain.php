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
	<link rel="stylesheet" type="text/css" href="./css/pages.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
	 crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style type="text/css">
	.schedule{
	  background-color: #AAB7B8;
	}
	#searchResult {
	    width: 411px;
	    margin-left: 516px;
	    text-align: left;
	    margin-top: -20px;
	    font-size: 15px;
/*	    background-color: #fff;*/
	    padding-top: 25px;
	}

	#searchResult li{
	    padding: 5px;
	    margin-bottom: 1px;
	}

	#searchResult li:nth-child(even){
	    background: cadetblue;
	    color: white;
	}

	#searchResult li:hover{
	    cursor: pointer;
	}

	input[type=text] {
	    padding: 15px;
	    width: 400px;
	}
</style>
<body>
    <header class="header">
		<div class="header" id="myHeader">
			<span class="logo"><a href="../index.php">OR2S</a></span>
			<div class="menu">
				<ul>
					<li><a href="../index.php"><i class="fa fa-home"></i> HOME</a></li>
					<li><a href="../pages/about.php"><i class="fa fa-users"></i> ABOUT US</a></li>
					<li><a href="#" class="active"><i class="fa fa-train"></i> TRAIN SCHEDULE</a></li>
					<li><a href="../booking/train-list.php"><i class="fa fa-ticket"></i> RESERVATION</a></li>
					<li><a href="../pages/pnr.php"><i class="fa fa-address-card"></i> PNR STATUS</a></li>
					<li><a href="../pages/contact.php"><i class="fa fa-phone"></i> CONTACT US</a></li>

					<li class="user">
						<?php if(isset($user_data['f_name'])) {
							echo '<b>Welcome, </b>'.$user_data['f_name'].' '.$user_data['l_name'];
						?>
					</li>
					<div class="logoutbtn">
						<li><a href="../project/auth/logout.php" class="logout"><i class="fa fa-sign-out"></i> LOGOUT</a></li>
					</div>
					<?php }else { ?>
						<div class="button">
							<li><a href="../../Admin/index.php" class="slogin"><i class="fa fa-lock"></i> STAFF LOGIN</a></li>
							<li><a href="../auth/login.php" class="login"><i class="fa fa-sign-in"></i> LOGIN</a></li>
							<li><a href="../auth/register.php" class="register"><i class="fa fa-user"></i> REGISTER</a></li>
						</div>
					<?php } ?>
				</ul>
			</div>
		</div>
	</header>

    <main>
    	<div class="schedule">
	        <div style="text-align: center; margin-top: 10px;">
	        	<h1>Enter Train Name </h1>
	    		<input class="schd" type="text" id="txt_search" name="txt_search">
	    		<input class="submitbtn" type="submit" id="txt_search" value="Search" name="search">
		   		<ul id="searchResult"></ul>

		    	<div class="clear"></div>

		    	<center>
		    	<div>
		    		<table>
			    		<thead>
							<tr>
								<th>Train Number</th>
								<th>Train Name</th>
								<th>Source</th>
								<th>Destination</th>
							</tr>
							<tbody>
								<tr id="trainDetail"></tr>
							</tbody>
						</thead>
					</table>
		    	</div>

		    	<?php 

		    	if("#txt_search"){
			    		$query = "select * from trains left join timetable on timetable.train_id=trains.id left join stops on stops.ord=trains.id where stops.division_id=trains.division_id";
			    		$result = mysqli_query($con, $query);
			    		$row = mysqli_fetch_array($result);


		    	?>
				<div style="margin-top: 10px;">
					<table>
						<thead>
							<tr>
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
								<td><?php echo $row['arr_time']; ?></td>
								<td><?php echo $row['dept_time']; ?></td>
								<td><?php echo $row['distance'].' KM'; ?></td>
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
				
		    	</center>

		    </div>
		</div>
    </main>

<script type="text/javascript" src="../js/index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $("#txt_search").keyup(function(){
            var search = $(this).val();

            if(search != ""){

                $.ajax({
                    url: 'getSearch.php',
                    type: 'post',
                    data: {search:search, type:1},
                    dataType: 'json',
                    success:function(response){

                        var len = response.length;
                        $("#searchResult").empty();
                        for( var i = 0; i<len; i++){
                            var id = response[i]['id'];
                            var num = response[i]['train_num'];
                            var name = response[i]['train_name'];

                            $("#searchResult").append("<li value='"+id+"'>"+num+" "+name+"</li><br/>");

                        }

                        // binding click event to li
                        $("#searchResult li").bind("click",function(){
                            setText(this);
                        });


                    }
                });
            }

        });


    });


    function setText(element){

        var value = $(element).text();
        var trainid = $(element).val();

        $("#txt_search").val(value);
        $("#searchResult").empty();

        // Request User Details
        $.ajax({
            url: 'getSearch.php',
            type: 'post',
            data: {trainid:trainid, type:2},
            dataType: 'json',
            success: function(response){

                var len = response.length;
                $("#trainDetail").empty();
                if(len > 0){
                    var trainnum = response[0]['train_num'];
                    var trainname = response[0]['train_name'];
                    var source = response[0]['schedule_from'];
                    var dest = response[0]['schedule_to'];

                    
                    $("#trainDetail").append("<td>"+trainnum+"</td>");
                    $("#trainDetail").append("<td>"+trainname+"</td>");
                    $("#trainDetail").append("<td>"+source+"</td>");
                    $("#trainDetail").append("<td>"+dest+"</td>");
                }
            }

        });
    }

</script>

</body>
</html>