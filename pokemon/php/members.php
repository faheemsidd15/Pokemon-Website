<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>

	<head>
		<meta charset="UTF-8">
		<title>| PokeCommunity |</title>
		<!-- Importing Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


			}



		</style>
	</head>

	<body>
		<?php
		//************************************* PHP***************************
		// put your code here
		// Start the session and always require the connect.php


		session_start();
		require 'connect.php';

		if (@$_SESSION["userName"]) {


			// Check to see if the user is logged in within the session
			// Closing the php tag so we can do html stuff
			?>




			<?php
//include the header.php here
			include("header.php");


//			$cat_id = $_GET['cat'];
//
//			//echo $cat_id;
//
//			$query = "SELECT * "
//					. "FROM topics"
//					. " WHERE fk_cat_id=" . $cat_id . ";";
//
//			$result = mysql_query($query);
//
//			while ($row = mysql_fetch_assoc($result)) {
//				echo $row;
//			}
//echo$_SESSION["cat_id"];
			?>


			<!--
	THIS IS WHERE THE CONTENT OF THE HTML WILL GO
			-->



				<?php
				echo "		<h3>PokeMembers</h3>
			
			<table class='table table-bordered'>

		<thead>
		
<tr>
		<th>Members</th>
		<th>Email</th>
		
		
		</tr>
		</thead>
	";



				$check = mysql_query("SELECT * FROM users");

			$rows = mysql_num_rows($check);



			while ($row = mysql_fetch_assoc($check)) {
				$id = $row['id'];
				$email = $row['email'];

				echo "<tr>";
				echo "<td><a href='profile.php?id=$id'>" . $row['userName'] . "</a></td>";
				echo "<td><a href='profile.php?email=$email'>" . $row['email'] . "</a><td>";
				echo "</tr>";
			}


			echo "</table>";
			?>


			<?php
			if (@$_GET['action'] == "logout") {
				session_destroy();
				//header("Location: login.php");

				$login = "login.php";

				echo "<script type='text/javascript'>document.location.href='{$login}';</script>";
			}
		} else {
			echo "You Must be logged in. <br/>";
			echo "<a href='login.php'>Click here to LOGIN</a>";
		}
		?>
	</body>

</html>