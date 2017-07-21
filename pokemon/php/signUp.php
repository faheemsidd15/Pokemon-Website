<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>

	<head>
		<meta charset="UTF-8">
		<title>|Sign up|</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Importing Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		
		
		
				 <link rel="stylesheet" href="assets/css/Bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap.css" />
		<script src="assets/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="assets/bootstrap.min.js" type="text/javascript"></script>
		<link rel="styleSheet" href="assets/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css" />
		
		
		<style>
			@import "bourbon";
			body {
				background: #eee !important;
			}

			.wrapper {
				margin-top: 80px;
				margin-bottom: 80px;
			}

			.form-signin {
				max-width: 380px;
				padding: 15px 35px 45px;
				margin: 0 auto;
				background-color: #fff;
				border: 1px solid rgba(0, 0, 0, 0.1);
				.form-signin-heading,
				.checkbox {
					margin-bottom: 30px;
				}
				.checkbox {
					font-weight: normal;
				}
				.form-control {
					position: relative;
					font-size: 16px;
					height: auto;
					padding: 10px;
					&:focus {
						z-index: 2;
					}
				}
				input[type="text"] {
					margin-bottom: -1px;
					border-bottom-left-radius: 0;
					border-bottom-right-radius: 0;
				}
				input[type="password"] {
					margin-bottom: 20px;
					border-top-left-radius: 0;
					border-top-right-radius: 0;
				}
			}
		</style>
	</head>

	<body>




		


		<?php
// require the connection, can use both either require or include_once functions
		require 'connect.php';


		// Variables
		$userName = @$_POST['userName'];
		$password = @$_POST['password'];
		$confirmPassword = @$_POST['confirmPassword'];
		$email = @$_POST['email'];
		$date = date("Y-m-d");

		// Adding encription for the password by adding sha1
		$passwordEn = sha1($password);


// the if statement to post the things in the table
		// Some error handling, all the fields are required to sign up
		// The Username must be between 5 and 25 characters long
		// The password must be atleast 6 characters 
		// The password must match the confirm password
		
		
		


		if (isset($_POST['submit'])) {

			if ($userName && $password && $confirmPassword && $email) {

				if (strlen($userName) >= 5 && strlen($userName) < 25 && strlen($password) >= 6) {

					if ($confirmPassword == $password) {

						$query = "INSERT INTO users(userName, password, email, date)" . "VALUES('{$userName}', '{$passwordEn}', '{$email}', '{$date}');";
						if (!mysql_query($query)) {

							die('Error: ' . mysql_error());
						} else {
							echo "<center><h2>You have successfully registered as </h2</center>" . $userName . "<br /> <a href = 'login.php'>Login</a>";
						}
					} else {
						echo"<center><h3>The passwords do not match</h3></center>";
					}
				} else {

					if (strlen($userName) < 5 || strlen($userName) > 25) {
						echo"<center><h3>Username must be between 5 and 25 characters</h3></center>";
					}

					if (strlen($password) < 6) {
						echo"<center><h3>Password must be atleast 6 characters long</h3></center>";
					}
				}
			} else {

				echo"<center><h3>Please Fill in all the Fields</h3></center>";
			}
		}
		?>
        <!-------End of PHP ----------------------->

		
		
		<div class="wrapper">
			<form class="form-signin" action="signUp.php" method="POST">
				<h2 class="form-signin-heading">Sign-Up</h2>

				<input type="text" class="form-control" name="userName" placeholder="User Name"  required="" autofocus="" /><br />

				<input type="password" class="form-control" name="password" placeholder="Password" required="" /><br />

				<input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required="" /><br />

				<input type="email" class="form-control" name="email" placeholder="Enter email" required="" /><br />


				<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button><br />
				<button class="btn btn-lg btn-primary btn-block" type="reset"> Reset</button><br />
				<a href="login.php" class="btn btn-lg btn-secondary btn-block"> or Login to Pokeforum</a>
			</form>
		</div>
	</body>           

</html>