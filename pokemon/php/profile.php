<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>

	<head>
		<meta charset="UTF-8">
		<title>| Member |</title>
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
		//*************************************PHP***************************
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
			?>


			<!--
	THIS IS WHERE THE CONTENT OF THE HTML WILL GO
			-->
			<?php
			$check = mysql_query("SELECT * FROM users WHERE id= '{$_GET['id']}'");
			$rows = mysql_num_rows($check);



			while ($row = mysql_fetch_assoc($check)) {
			
			
			
			
				$pokemon1 = $row['pokemon1'];
				$pokemon2 = $row['pokemon2'];
				$pokemon3 = $row['pokemon3'];
				$pokemon4 = $row['pokemon4'];
				$pokemon5 = $row['pokemon5'];
				$pokemon6 = $row['pokemon6'];
			
			}
			if (@$_GET['id']) {

				$check = mysql_query("SELECT * FROM users WHERE id= '{$_GET['id']}'");
				$rows = mysql_num_rows($check);

				if (mysql_num_rows($check) != 0) {

					while ($row = mysql_fetch_assoc($check)) {

						echo "<center>";


//					echo '<img name="Pokeball" id="black_pokeball2" src="assets/images/black_pokeball2.png" class="img-responsive" alt="Pokemon Logo" width=67>';


						echo "<img id='profile_pic'  src='../" . $row['profile_pic'] . "' width='80' height='80'>";
						echo "<h1>" . $row['userName'] . "</h1><br />";
						echo '<script>
                            rotateAnimation("profile_pic", 8);
						</script>';
						echo "<h4>" . "Date Registered:  " . $row['date'] . "</h4><br />";
						echo "<h4>" . $row['email'] . "</h4>";

						echo "</center>";
						
						?>
	<center>
				<div id="pokemonImages" class="pokemonImages">
					<?php echo "<img src='../$pokemon1' width= '130' height= '120'>"; ?>
					<?php echo "<img src='../$pokemon2' width= '130' height= '120'>"; ?>
					<?php echo "<img src='../$pokemon3' width= '130' height= '120'>"; ?>
					<?php echo "<img src='../$pokemon4' width= '130' height= '120'>"; ?>
					<?php echo "<img src='../$pokemon5' width= '130' height= '120'>"; ?>
					<?php echo "<img src='../$pokemon6' width= '130' height= '120'>"; ?>
				</div>
		
		<?php
		$pokeball = "../assets/images/pokeball.png";
		
		if($pokemon1 != $pokeball ){
			
			?>
		
		<div id="pokemon_id">
					| Pokemon 1 ID #<b><?php echo substr($pokemon1, 14 ,-4); ?></b>
					| Pokemon 2 ID #<b><?php echo substr($pokemon2, 14 ,-4); ?></b>
					| Pokemon 3 ID #<b><?php echo substr($pokemon3, 14 ,-4); ?></b>
					| Pokemon 4 ID #<b><?php echo substr($pokemon4, 14 ,-4); ?></b>
					| Pokemon 5 ID #<b><?php echo substr($pokemon5, 14 ,-4); ?></b>
					| Pokemon 6 ID #<b><?php echo substr($pokemon6, 14 ,-4); ?></b>
				</div>
	</center>




						<?php
		}
					}
				} else {

					echo "ERROR";
				}
			} else {
				$index = "index.php";

				echo "<script type='text/javascript'>document.location.href='{$index}';</script>";
			}
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