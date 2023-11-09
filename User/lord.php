<?php
session_start();
include("./db/connection.php");
include("./db/functions.php");
echo "<link rel='stylesheet' type='text/css' href='./css/header.css' />";
echo "<link rel='stylesheet' type='text/css' href='./css/style.css' />";

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

<?php include("./header.php"); ?>

	<main>
		<section class="banner homeImage">
		

		<div class="form-container">	
			<form action="/or2s/User/booking/train-list.php" method="GET">
				<h3><i class="fa fa-road"></i> Find Train <i class="fa fa-train"></i></h3>
				<div style="">
					<?php 
						date_default_timezone_set('Asia/Kolkata');
						echo date('d-m-Y'." ".'l'." ".'h:i:s A'); 
					?>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="column">
							<label for="from">From Station  </label>
							<span class="speechBtn" onclick="startConverting();"><i class="fa fa-microphone"></i></span>
							<!-- <div id="result"></div> -->
							
							<?php 
								$query = "select ord,stop_code,stop_name from stops";
								$from = mysqli_query($con,$query);
							?>
							<select class="form-select select1" id="from" name="from" placeholder="From" required>
							<option value="" disabled selected></option>
							<?php 
								if(mysqli_num_rows($from) > 0){
									while($row = mysqli_fetch_array($from)){
							?>
								<option value="<?php echo $row['ord'];?>"><?php echo $row['stop_code'];?> - <?php echo $row['stop_name'];?></option>
							<?php 
									}
							?>
							</select>
							<?php 
								}
							?>
						</div>
						<div class="column">
							<label for="to">To Staion</label>
							<span class="speechBtn" onclick="startConverting();"><i class="fa fa-microphone"></i></span>
							<?php 
								$query = "select ord,stop_code,stop_name from stops";
								$to = mysqli_query($con,$query);
							?>
							<select class="form-select select2" id="to" name="to" placeholder="To" required>
							<option value="" disabled selected></option>
							<?php 
								if(mysqli_num_rows($to) > 0){
									while($row = mysqli_fetch_array($to)){
							?>
								<option value="<?php echo $row['ord'];?>" ><?php echo $row['stop_code'];?> - <?php echo $row['stop_name'];?></option>
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
							<input type="date" value="<?php echo date('Y-m-d'); ?>" id="date" name="date" required>
						</div>
						<div class="column" style="width: 50%;">
							<label for="class">Class</label>
							<?php 
								$query = "select class_id,class_name from train_class limit 8";
								$result = mysqli_query($con,$query);
							?>
							<select class="form-select" id="class" name="class" placeholder="class" required>
							<option value="" disabled selected></option>
							<?php 
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
							?>
								<option value="<?php echo $row['class_id'];?>"><?php echo $row['class_name'];?></option>
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
								$query = "select quota_id,quota_name from train_quota limit 6";
								$result = mysqli_query($con,$query);
							?>
							<select class="form-select" id="quota" name="quota" placeholder="quota" required>
							<option value="" disabled selected></option>
							<?php 
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
							?>
								
								<option value="<?php echo $row['quota_id'];?>"><?php echo $row['quota_name'];?></option>
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
				<button style="width: 100%;" type="submit" id="searchBtn" name="submit" class="form-btn">
					<i class="fa fa-search"></i> Check Availability
				</button>
			</form>
		</div>
    	</section>
	</main>

<?php include("footer.php"); ?>

<script src="js/jquery.min.js"></script>

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
	var result = document.getElementById('result');
  
		function startConverting () {

		if('webkitSpeechRecognition' in window) {
			var speechRecognizer = new webkitSpeechRecognition();
			speechRecognizer.continuous = true;
			speechRecognizer.interimResults = true;
			speechRecognizer.lang = 'en-US';
			speechRecognizer.start();

			var finalTranscripts = '';

			speechRecognizer.onresult = function(event) {
				var interimTranscripts = '';
				for(var i = event.resultIndex; i < event.results.length; i++){
					var transcript = event.results[i][0].transcript;
					transcript.replace("\n", "<br>");
					if(event.results[i].isFinal) {
						finalTranscripts += transcript;
					}else{
						interimTranscripts += transcript;
					}
				}
				result.innerHTML = finalTranscripts + '<span style="color: #999">' + interimTranscripts + '</span>';
			};
			speechRecognizer.onerror = function (event) {

			};
		}else {
			result.innerHTML = 'Your browser is not supported. Please download Google chrome or Update your Google chrome!!';
		}	
	}
</script>
