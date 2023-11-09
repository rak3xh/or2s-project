<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>

	<link rel="stylesheet" type="text/css" href="./css/changePassword.css" />
</head>
<body>

	<div class="form-container">	
			<form action="" method="POST">
				<h3>Change Password</h3>

				<div class="form-group">
					<div class="row">
						<div class="column">
							<label for="new_pass">New Password</label>
							<input type="password" id="new_pass" name="password" placeholder="New Password" required>
						</div>
					</div>
					<div class="row">
						<div class="column">
							<label for="conf_pass">Confirm Password</label>
							<input type="password" id="conf_pass" name="password" placeholder="Confirm Password" required>
						</div>
					</div>
				</div>
				
				<input type="submit" id="change_pass" value="change password" class="form-btn form-space">
				<p>Back to<a href="./login.php"> Sign In</a></p>
			</form>
	</div>

</body>
</html>