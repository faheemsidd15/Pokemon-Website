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
			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);



			while ($row = mysql_fetch_assoc($check)) {

				$userName = $row['userName'];
				$id = $row['id'];
				$date = $row['date'];
				$profile_pic = '../' . $row['profile_pic'];
				$pokemon1 = '../' . $row['pokemon1'];
				$pokemon2 = '../' . $row['pokemon2'];
				$pokemon3 = '../' . $row['pokemon3'];
				$pokemon4 = '../' . $row['pokemon4'];
				$pokemon5 = '../' . $row['pokemon5'];
				$pokemon6 = '../' . $row['pokemon6'];
			}
			?>







		<center> 
			<div class="wrapper">


				<?php echo "<img src='".@$profile_pic."' width= '100' height= '100'>"; ?> <br />

				<div id="pokemonImages" class="pokemonImages">
					<?php echo "<img src='$pokemon1' width= '130' height= '120'>"; ?>
					<?php echo "<img src='$pokemon2' width= '130' height= '120'>"; ?>
					<?php echo "<img src='$pokemon3' width= '130' height= '120'>"; ?>
					<?php echo "<img src='$pokemon4' width= '130' height= '120'>"; ?>
					<?php echo "<img src='$pokemon5' width= '130' height= '120'>"; ?>
					<?php echo "<img src='$pokemon6' width= '130' height= '120'>"; ?>
				</div>
				
				<div id="pokemon_id">
					| Pokemon 1 ID #<b><?php echo substr($pokemon1, 17 ,-4); ?></b>	
					| Pokemon 2 ID #<b><?php echo substr($pokemon2, 17 ,-4); ?></b>
					| Pokemon 3 ID #<b><?php echo substr($pokemon3, 17 ,-4); ?></b>
					| Pokemon 4 ID #<b><?php echo substr($pokemon4, 17 ,-4); ?></b>
					| Pokemon 5 ID #<b><?php echo substr($pokemon5, 17 ,-4); ?></b>
					| Pokemon 6 ID #<b><?php echo substr($pokemon6, 17  ,-4); ?></b>
				</div>

				<br />

				Username: <?php echo $userName ?> <br />
				ID: <?php echo $id ?> <br />


				<a href="account.php?action=cp"><button class="btn btn-sm btn-secondary ">Change password</button></a>
				<a href="account.php?action=pp"><button class="btn btn-sm btn-secondary ">Change profile picture</button></a>
				<a href="account.php?action=ap"><button class="btn btn-sm btn-secondary ">Add/Change Pokemon</button></a>


			</div>
		</center>

		<center>
			<div class="owned">





			</div>



		</center>





		<?php
		if (@$_GET['action'] == "logout") {
			session_destroy();
			//header("Location: login.php");

			$login = "login.php";

			echo "<script type='text/javascript'>document.location.href='{$login}';</script>";
		}

		if (@$_GET['action'] == "ap") {

			$beg = "assets/images/";
			$end = ".png";
			$pokemon1 = @$_POST['pokemon1'];
			$pokemon2 = @$_POST['pokemon2'];
			$pokemon3 = @$_POST['pokemon3'];
			$pokemon4 = @$_POST['pokemon4'];
			$pokemon5 = @$_POST['pokemon5'];
			$pokemon6 = @$_POST['pokemon6'];
            $fileUp = "../";

			$combined = $beg .  $pokemon1 . $end;
			$combined2 = $beg . $pokemon2 . $end;
			$combined3 = $beg . $pokemon3 . $end;
			$combined4 = $beg . $pokemon4 . $end;
			$combined5 = $beg . $pokemon5 . $end;
			$combined6 = $beg . $pokemon6 . $end;
			?>
			<div class="container-fluid">
				<center>
					Input 3 digits value less than 721
					<br />
					<!-- Pokemon 1 -->
					<form action='account.php?action=ap' method='POST'>

						<input type="number" name="pokemon1" placeholder="try '001'">
						<input type='submit' name='save_pokemon1' value ='pokemon1'>

					</form>
					<!-- Pokemon 2 -->
					<form action='account.php?action=ap' method='POST'>

						<input type="number" name="pokemon2" placeholder="try '009'">
						<input type='submit' name='save_pokemon2' value ='pokemon2'>

					</form>
					<!-- Pokemon 3 -->
					<form action='account.php?action=ap' method='POST'>

						<input type="number" name="pokemon3" placeholder="try '010'">
						<input type='submit' name='save_pokemon3' value ='pokemon3'>

					</form>
					<!-- Pokemon 4 -->
					<form action='account.php?action=ap' method='POST'>

						<input type="number" name="pokemon4" placeholder="try '151'">
						<input type='submit' name='save_pokemon4' value ='pokemon4'>

					</form>
					<!-- Pokemon 5 -->
					<form action='account.php?action=ap' method='POST'>

						<input type="number" name="pokemon5" placeholder="try '345'">
						<input type='submit' name='save_pokemon5' value ='pokemon5'>

					</form>
					<!-- Pokemon 6 -->
					<form action='account.php?action=ap' method='POST'>

						<input type="number" name="pokemon6" placeholder="try '700'">
						<input type='submit' name='save_pokemon6' value ='pokemon6'>

					</form>
				</center>
			</div>
	<br />
	<br />
	<br />

		<?php
		// First pokemon beginning
		if (isset($_POST['save_pokemon1'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);

			while ($row = mysql_fetch_assoc($check)) {
				$db_p1 = $row['pokemon1'];
			}



			if (strlen($pokemon1) == 3 && $pokemon1 < 721) {

				if ($query = mysql_query("UPDATE users SET pokemon1= '{$combined}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


					echo"You Saved your first pokemon.";

					$URL = "account.php?action=ap";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				} else {
					echo "Could not save your Pokemon";
				}
			} else {


				echo "Input Value should be 3 numbers long and less than 721<br />";
				echo "Remember if your choosing 1-9 add '00' in front of it";
			}
		}
// This is the first pokemon ending
// This is second Pokemon Beginning

		if (isset($_POST['save_pokemon2'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);

			while ($row = mysql_fetch_assoc($check)) {
				$db_p1 = $row['pokemon2'];
			}



			if (strlen($pokemon2) == 3 && $pokemon2 < 721) {

				if ($query = mysql_query("UPDATE users SET pokemon2= '{$combined2}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


					echo"You Saved your second pokemon.";

					$URL = "account.php?action=ap";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				} else {
					echo "Could not save your Pokemon";
				}
			} else {


				echo "Input Value should be 3 numbers long and less than 721<br />";
				echo "Remember if your choosing 1-9 add '00' in front of it";
			}
		} // end of Pokemon 2
		// 3 pokemon beginning
		if (isset($_POST['save_pokemon3'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);

			while ($row = mysql_fetch_assoc($check)) {
				$db_p1 = $row['pokemon3'];
			}



			if (strlen($pokemon3) == 3 && $pokemon3 < 721) {

				if ($query = mysql_query("UPDATE users SET pokemon3= '{$combined3}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


					echo"You Saved your third pokemon.";

					$URL = "account.php?action=ap";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				} else {
					echo "Could not save your Pokemon";
				}
			} else {


				echo "Input Value should be 3 numbers long and less than 721<br />";
				echo "Remember if your choosing 1-9 add '00' in front of it";
			}
		}
// This is the 3 pokemon ending
		// 4 pokemon beginning
		if (isset($_POST['save_pokemon4'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);

			while ($row = mysql_fetch_assoc($check)) {
				$db_p1 = $row['pokemon4'];
			}



			if (strlen($pokemon4) == 3 && $pokemon4 < 721) {

				if ($query = mysql_query("UPDATE users SET pokemon4= '{$combined4}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


					echo"You Saved your Fourth pokemon.";

					$URL = "account.php?action=ap";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				} else {
					echo "Could not save your Pokemon";
				}
			} else {


				echo "Input Value should be 3 numbers long and less than 721<br />";
				echo "Remember if your choosing 1-9 add '00' in front of it";
			}
		}
// This is the first pokemon ending	
		// 5 pokemon beginning
		if (isset($_POST['save_pokemon5'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);

			while ($row = mysql_fetch_assoc($check)) {
				$db_p1 = $row['pokemon5'];
			}



			if (strlen($pokemon5) == 3 && $pokemon5 < 721) {

				if ($query = mysql_query("UPDATE users SET pokemon5= '{$combined5}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


					echo"You Saved your Fifth pokemon.";

					$URL = "account.php?action=ap";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				} else {
					echo "Could not save your Pokemon";
				}
			} else {


				echo "Input Value should be 3 numbers long and less than 721<br />";
				echo "Remember if your choosing 1-9 add '00' in front of it";
			}
		}
// This is the 5 pokemon ending
		// 6 pokemon beginning
		if (isset($_POST['save_pokemon6'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);

			while ($row = mysql_fetch_assoc($check)) {
				$db_p1 = $row['pokemon6'];
			}



			if (strlen($pokemon6) == 3 && $pokemon6 < 721) {

				if ($query = mysql_query("UPDATE users SET pokemon6= '{$combined6}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


					echo"You Saved your Final pokemon.";

					$URL = "account.php?action=ap";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				} else {
					echo "Could not save your Pokemon";
				}
			} else {


				echo "Input Value should be 3 numbers long and less than 721<br />";
				echo "Remember if your choosing 1-9 add '00' in front of it";
			}
		}
// This is the 6 pokemon ending
	}

	// This is for the Profile Picture ******************************

	if (@$_GET['action'] == "pp") {

		echo "<form action='account.php?action=pp' method='POST' enctype='multipart/form-data'>"
		. "<br />"
		. "<center>"
		. "Available images: <b>.png</b><b>.jpg</b><b>.jpeg</b> <br /><br />"
		. "<input type='file' name='image'><br />"
		. "<input type='submit' name='change_pic' value ='change'>"
		. "</center>";


		// Change the profile pic, found some of this on Stack Over flow
		if (isset($_POST['change_pic'])) {

			$errors = array();
			$allowed_e = array('png', 'jpg', 'jpeg');

			$file_name = $_FILES['image']['name'];
			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$file_s = $_FILES['image']['size'];
			$file_tmp = $_FILES['image']['tmp_name'];

			if (in_array($file_ext, $allowed_e) === false) {
				$errors[] = 'This file not compatible.';
			}


			if ($file_s > 60000000) {

				$errors[] = 'File must be under 6mb';
			}

			if (empty($errors)) {

				move_uploaded_file($file_tmp, 'assets/images/' . $file_name);
				$images_upload = 'assets/images/' . $file_name;
				$check = mysql_query("SELECT  * FROM users WHERE userName= '{$_SESSION['userName']}'");
				$rows = mysql_num_rows($check);

				while ($row = mysql_fetch_assoc($check)) {
					$db_image = $row['profile_pic'];
				}

				if ($query = mysql_query("UPDATE users SET profile_pic='{$images_upload}'" . "WHERE userName='{$_SESSION['userName']}'")) {


					echo "Your picture has been changed";
				}
			} else {
				foreach ($errors as $error) {
					echo $error, '<br />';
				}
			}
		}

		echo "</form>";
	}

	// This is For changing the password

	if (@$_GET['action'] == "cp") {
		echo "<div class='wrapper'>";
		echo "<br /><form action='account.php?action=cp' method='POST'><center>";

		echo "Current Password: <input type='password' name='current_pass'><br />"
		. "New Password:<input type='password'name='new_pass'><br /> "
		. "Re-Type Password:<input type='password'name='re_pass'><br />"
		. "<button input type='submit' name='change_pass' class='btn btn-sm btn-primary'>Submit</button>"
		. "<button input type='reset' class='btn btn-sm btn-secondary'>Reset</button>";
		echo "</center></form>";
		echo "</div>";

		$current_pass = @$_POST['current_pass'];
		$new_pass = @$_POST['new_pass'];
		$re_pass = @$_POST['re_pass'];

		$passEn = sha1($new_pass);

		if (isset($_POST['change_pass'])) {

			$check = mysql_query("SELECT * FROM users WHERE userName= '{$_SESSION['userName']}'");
			$rows = mysql_num_rows($check);



			while ($row = mysql_fetch_assoc($check)) {

				$get_pass = $row['password'];
			}
			if (sha1($current_pass) == $get_pass) {

				if (strlen($new_pass) > 5) {


					if ($re_pass == $new_pass) {

						if ($query = mysql_query("UPDATE users SET password= '{$passEn}'" . "WHERE userName = '{$_SESSION['userName']}';")) {


							echo"Your password is changed.";
						}
					} else {
						echo "Password did not match";
					}
				} else {
					echo "Must be longer than 5 characters";
				}
			} else {
				echo "Password did not Match";
			}
		}
	}
} else {
	echo "You Must be logged in. <br/>";
	echo "<a href='login.php'>Click here to LOGIN</a>";
}
?>
</body>

</html>