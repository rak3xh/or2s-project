<?php 
session_start();
include("../db/connection.php");
include("../db/functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$f_name = $_POST['f_name'];
	$m_name = $_POST['m_name'];
	$l_name = $_POST['l_name'];
	$gender = $_POST['gender'];
	$date_of_birth = $_POST['date_of_birth'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$aadhar = $_POST['aadhar'];
	$pan = $_POST['pan'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$pin_code = $_POST['pin_code'];
	$password = md5($_POST['password']);
	$confirm = md5($_POST['confirm']);

	//print_r($_POST); return;

	if(!empty($email) && !empty($password) && !is_numeric($email) && ($password === $confirm)){
		
		$user_id = random_num(10);
		$query = "insert into users (f_name,m_name,l_name,password,gender,date_of_birth,email,phone,aadhar,pan,address,city,state,pin_code) 
		values ('$f_name','$m_name','$l_name','$password','$gender','$date_of_birth','$email','$phone','$aadhar','$pan','$address','$city','$state','$pin_code')";
		
		mysqli_query($con, $query);

		header("Location: ./login.php");
		die;
	}else if($password != $confirm){
		echo '<script>alert("Please check password before submit!!")</script>';
	}else{
		echo '<script>alert("Please input your valid information.")</script>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
	<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/register/reg2.png">
	<link rel="stylesheet" type="text/css" href="./css/register.css" />
	<style>
		#google_translate_element{
			width: 50%;
			padding-top: 1px;
			padding-bottom: 1px;
			font-size: 5px;
			
		}
		</style>
</head>
<body>
	<div class="form-container">
	
		<form action="" method="POST">
			<div class="row">
				<div class="column" id="trans">
		<div id="google_translate_element">
		</div>
				</div>
			<div class="column">
				<img id="logo" src="/or2s/User/images/logo/or2s_black.png">
			</div>
		
		
	    
		</div>
			<h3><img id="reg"src="/or2s/User/images/register/reg.gif"></h3>
			<div id="note">
			• All the (<font color="red">*</font>) marked fields are mandatory.
            </div>
			<div id="note1">
			• Fill the correct information.
            </div>
			<div class="form-group">
				<div id="pass">
				<p>•Personal Details</p>
				</div>
				<div class="row">
					<div class="column">
						<label for="f_name">First Name<b>&nbsp;*</b></label>
						<input type="name" id="f_name" name="f_name" required>
					</div>
					<div class="column">
						<label for="m_name">Middle Name (Optional)</label>
						<input type="name" id="m_name" name="m_name">
					</div>
					<div class="column">
						<label for="l_name">Last Name<b>&nbsp;*</b></label>
						<input type="name" id="l_name" name="l_name" required>
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label for="gender">Gender<b>&nbsp;*</b></label>
						<select name="gender" id="gender" class="form-select" required>
							<option value="1">Male</option>
							<option value="2">Female</option>
							<option value="2">Transgender</option>
						</select>
					</div>
					<div class="column">
						<label for="date_of_birth">Date of birth<b>&nbsp;*</b></label>
						<input type="date" id="age" name="age" required>
					</div>
					<div class="column">
						<label for="email">Email<b>&nbsp;*</b></label>
						<input type="email" id="email" name="email" required>
					</div>
				</div>
				<div class="row">
					<div class="column">
						<label for="phone">Phone Number<b>&nbsp;*</b></label>
						<input type="text" id="phone" name="phone" maxlength="10" required>
					</div>
					<div class="column">
						<label for="aadhar">Aadhar Number<b>&nbsp;*</b></label>
						<input type="text" id="aadhar" name="aadhar" maxlength="12" required>
					</div>
					<div class="column">
						<label for="pan">PAN Number (Optional)<b>&nbsp;</b></label>
						<input style="text-transform:uppercase;" type="text" id="pan" name="pan" maxlength="10">
					</div>
				</div>
				<div class="row">
					
					<div class="column">
						<label for="address">Address<b>&nbsp;*</b></label>
						<input type="name" id="address" name="address" required>
					</div>
					<div class="column">
						<label for="city">City<b>&nbsp;*</b></label>
						<input type="name" id="city" name="city" required>
					</div>
					<div class="column">
						<label for="state">State<b>&nbsp;*</b></label>
						<select name="state" id="state" class="form-select" required>
							<option value="1">Andhra Pradesh</option>
							<option value="2">Arunachal Pradesh</option>
							<option value="3">Assam</option>
							<option value="4">Bihar</option>
							<option value="5">Chhattisgarh</option>
							<option value="6">Delhi NCR</option>
							<option value="7">Goa</option>
							<option value="8">Gujrat</option>
							<option value="9">Haryana</option>
							<option value="10">Himachal Pradesh</option>
							<option value="11">Jharkhand</option>
							<option value="12">Karnataka</option>
							<option value="13">Kerala</option>
							<option value="14">Madhya Pradesh</option>
							<option value="15">Maharastra</option>
							<option value="16">Manipur</option>
							<option value="17">Meghalaya</option>
							<option value="18">Mizoram</option>
							<option value="19">Nagaland</option>
							<option value="20">Odisha</option>
							<option value="21">Punjab</option>
							<option value="22">Rajasthan</option>
							<option value="23">Sikkim</option>
							<option value="24">Tamil Nadu</option>
							<option value="25">Telengana</option>
							<option value="26">Tripura</option>
							<option value="27">Uttarakhand</option>
							<option value="28">Uttar Pradesh</option>
							<option value="29">West Bengal</option>
							<option value="30">Andaman and Nicobar Islands</option>
                            <option value="31">Chandigarh</option>
							<option value="32">Dadra and Nagar Haveli and Daman and Diu</option>
							<option value="34">Jammu and Kashmir</option>
							<option value="35">Ladakh</option>
							<option value="36">Lakshadweep</option>
							<option value="37">Puducherry</option>



							
						</select>
					</div>
				</div>
				<div class="row"  >
					<div class="column">
						<label for="pin_code">Pin Code<b>&nbsp;*</b></label>
						<input type="text" id="pin_code" name="pin_code" maxlength="6" required>
					</div>
				</div>
				<div id="cut">
	</div>
				
				<div id="pass">
				<p>•Password Details (minimum 8 characters)</p>
				</div>
					<div class="row" >
					<div class="column">
						<label for="password">Password<b>&nbsp;*</b></label>
						<input type="password" id="password" name="password" required minlenght="8">
					</div>
					<div class="column">
						<label for="confirm">Confirm Password<b>&nbsp;*</b></label>
						<input type="text" id="confirm" name="confirm" required minlenght="8">
					</div>
				</div>
			</div>
			
			<div id="down">
				
			
			<center><input type="submit" id="login" value="Register" class="form-btn form-space"></center>
			<p>Have an Account? <a href="./login.php"><i class="fa fa-arrow-left"></i> LOGIN </a></p></button>   
			<p>Back to     <a href="../index.php"><i class="fa fa-home"></i> HOME</a></p>
			</div>
		</form>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/register.js"></script>
	<script src="/or2s/User/script.js"></script>
	<script type="text/javascript">
$(function(){
        var dtToday = new Date();
    
        var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
        var day = dtToday.getDate();
        var year = dtToday.getFullYear() - 18;
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
    	var minDate = year + '-' + month + '-' + day;
        var maxDate = year + '-' + month + '-' + day;
    	$('#age').attr('max', maxDate);
    });
</script>
</body>
</html>