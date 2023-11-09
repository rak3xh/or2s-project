<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget Password</title>

	<link rel="stylesheet" type="text/css" href="./css/reset.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div class="form-container">
		<div id="keys">
			<img id="logo" src="/or2s/User/images/forgot/tumblr_ngdvhpKbrD1qea4hso1_400.gif">
		</div>

		<form action="" method="post">
			<h1>Forget Password</h1>

			<div class=" form-group">
				<div class="row">

					<div class="column" id="sets">
						<i class="fa fa-envelope" id="icons"></i>
						<input type="email" name="email" id="email" required placeholder="Enter your Email">
					</div>
				</div>
			</div>
			<button class="form-btn" type="submit" name="send" value="send code"> <i class="fa fa-paper-plane"></i>
				Send
				Reset link</button>
			<p>Back to<a href="./login.php"> Sign In</a></p>
		</form>
	</div>
</body>

</html>