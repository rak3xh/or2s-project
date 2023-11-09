<?php 
session_start();
include("../db/connection.php");
include("../db/functions.php");
if(isset($_POST['g-recaptcha-response'])){
	$recaptcha=$_POST['g-recaptcha-response'];
	 if(!$recaptcha){
		echo '<script>alert("Please Check the RECAPTCHA BOX")</script>';
		exit;

	 }
	 else{
		$secret="6Ldnq0ElAAAAAMv7l9PdiZP8EpHPcjgOYFP1fn3A";
		$url='https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha;
		$response=file_get_contents($url);
		$responsekeys=json_decode($response,true);
		print_r($responsekeys,true);
		

		if($responsekeys['success'])
		{
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$email = $_POST['email'];
				$password = $_POST['password'];
			
				if(!empty($email) && !empty($password) && !is_numeric($email)){
					
					$query = "select * from users where email = '$email'";
					
					$result = mysqli_query($con, $query);
					
			
					if($result){
						if($result && mysqli_num_rows($result) > 0){
							$user_data = mysqli_fetch_assoc($result);
							//echo md5($password);
							// print_r($email);
							// print_r($password);
							// print_r($user_data);
							// return;
							if($user_data['password'] == md5($password)){
			
								$_SESSION['id'] = $user_data['id'];
								header("Location: /or2s/User/index.php");
								die;
							}
						}
					}
					echo "Wrong User Name & Password";
				}else{
					echo "Wrong User Name & Password";
				}
			}
			
			
		}
	}
}


?>

<!DOCTYPE html>
<html>
<head>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="/or2s/User/images/logo/favicon.png">
	<link rel="stylesheet" type="text/css" href="./css/login.css" />
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>

	<div class="form-container">	
			<form action="" method="POST">
				<h1>Sign In</h1>
  
				<div class="form-group">
					<div class="row">
						<div class="column">
						<i class="fa fa-envelope"></i>
							<input type="email" id="email" name="email" placeholder="Enter Email" required>
						</div>
					</div>
					<div class="row">
						<div class="column">
						<i class="fa fa-key"></i>
							<input type="password" id="password" name="password" placeholder="Enter Password" required>
							
						</div>
						<span class="eye" onclick="myFunction()">
							<i id="hide1"class="fa fa-eye"></i>
							<i id="hide2"class="fa fa-eye-slash"></i>
							
							</span>
					</div>
					<div class="row">
						<span class="forget"><a style="color:red" href="./forget-password.php">Forget your Password?</a></span>
					</div>
					
				</div>
				
				
				
				<p style="color:white">Create account!<a style="color:red" href="./register.php"> Sign Up</a></p>
				<p style="color:white">Back to<a style="color:red" href="../index.php"><i id="arrow"class="fa fa-arrow-left"></i> Home</a></p>
				
				<div class="g-recaptcha" data-sitekey="6Ldnq0ElAAAAAKC1qK_vzQpKxU9iA7d5KUQKffNG"></div>
				<input type="submit" id="login" value="login" class="form-btn form-space">
				<style>
            .g-recaptcha {
              display: inline-block;
			  margin-left: auto;
               }
              </style>

			</form>
	</div>
	<script type="text/javascript">
		function myFunction(){
			var x=document.getElementById("password");
			var y=document.getElementById("hide1");
			var z=document.getElementById("hide2");

			if(x.type==='password')
			  {
				x.type="text";
				y.style.display="block";
				z.style.display="none";
			  }
			else
			  {
				x.type="password";
				y.style.display="none";
				z.style.display="block";
			  }  

		}


		</script>
	
	

</body>
</html>