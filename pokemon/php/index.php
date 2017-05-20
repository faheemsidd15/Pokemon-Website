<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>

	<head>
		<meta charset="UTF-8">
		<title>| Welcome to the PokeForum |</title>
		<!-- Importing Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>

			//This is for the radio buttons to make them bigger or smaller when choosing a category
			input[type=radio] {
				zoom: 1.00;
				transform: scale(2);
				-ms-transform: scale(2);
				-webkit-transform: scale(2);
				-o-transform: scale(2);
				-moz-transform: scale(2);
				transform-origin: 0 0;
				-ms-transform-origin: 0 0;
				-webkit-transform-origin: 0 0;
				-o-transform-origin: 0 0;
				-moz-transform-origin: 0 0;
				-webkit-transform-origin: 0 0;
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

		// Check to see if the user is logged in within the session
//		if (@$_SESSION["userName"]) {
//			// Closing the php tag so we can do html stuff
//			
		?>




		<?php
		//include the header.php here
		include("header.php");
		?>

		<!--
THIS IS WHERE THE CONTENT OF THE HTML WILL GO
		-->
		<!---- Table for the Categories ------------->


		<div class="wrapper">

			<form class="form-signin" action="index.php " method="post">

				<table class="table table-hover">
					
					<center>
						<h2>Welcome to the PokeForum</h2>
						<h3>Please choose a Category </h3>
					</center>
					<thead>

						<tr>
							<th>Select</th>
							<th>TEAM</th>
							<th>Description</th>

						</tr>
					</thead>
					<tbody>

						<tr>
							<th scope="row">
								<input type="radio" name="categories" onclick="javascript: submit()" value="1">
					<center>
						<h4>TEAM INSTINCT</h4></center>
					</th>

					<td>
						<img name="PokeMonLogo2" id="team1" src="../assets/images/team_instinct.jpg" class="img-responsive" alt="Pokemon Logo">

					</td>

					<td><p class="lead">Spark is the leader of Team Instinct, the yellow team. Spark is all about trusting your instincts — hence the name of the team. (Spark is not one for nuance.) If you feel that Pokémon are innately talented, and that success in battle can be chalked up to trusting your gut, Instinct is probably the way to go. Team Instinct's mascot is the legendary bird Zapdos.</p></td>

					</tr>
					<tr>
						<th scope="row">
							<input type="radio" name="categories"  onclick="javascript: submit()" value="2">
					<center>
						<h4>TEAM VALOR</h4></center>
					</th>


					<td>
						<img name="PokeMonLogo2" id="team2" src="../assets/images/team_valor.jpg" class="img-responsive" alt="Pokemon Logo">

					</td>


					<td><p class="lead">Candela is the head of the red team, and she's got spunk for days. Her M.O. is very much in line with what Pokémon trainers have been taught from the get-go: To be the very best Pokémon master, you've got to train for it. Bonding with your Pokémon helps to tap into their strengths, according to Team Valor. If that sounds good to you, go Valor. Also, if you like the fire bird legendary Moltres, that's another reason to go with Valor; Moltres is its mascot.</p></td>

					</tr>
					<tr class="clickable-row" onclick="javascript: submit()" value="3" >
						<th scope="row">
							<input type="radio" name="categories" onclick="javascript: submit()" value="3">
					<center>
						<h4>TEAM MYSTIC</h4></center>
					</th>

					<td>
						<img name="PokeMonLogo2" id="team3" src="../assets/images/team_mystic.jpg" class="img-responsive" alt="Pokemon Logo">
					</td>


					<td><p class="lead">Blanche is in charge of Team Mystic, the brainiest of the bunch. The blue team is most interested in evolution; beyond that, the members of this faction are cool to a point of intimidation. If you're interested in the science behind what makes Pokémon tick — and are convinced that keeping calm is all it takes for success — choose Team Mystic. Mystic is represented by Articuno, the icy legendary.</p></td>

					</tr>


					</tbody>
				</table>



			</form>
		</div>



		<?php
		// Variables
		// Choosing the Categories
		$categories = @$_POST['categories'];
		$cat_name = @$_POST['cat_name']; // this


		if (isset($_POST["categories"])) {

	$val = mysql_query("SELECT * FROM categories WHERE cat_id = '{$categories}'");
	$rows = mysql_num_rows($val);

	if (mysql_num_rows($val) != 0) {

		while ($row = mysql_fetch_assoc($val)) {
			$db_cat_id = $row['cat_id'];
			$db_cat_name = $row['cat_name'];
		}


		if ($categories == $db_cat_id) { //this
			@$_SESSION["cat_id"] = $categories;
			@$_SESSION["cat_name"] = $cat_name;

			//header("Location: topics.php");


			$URL = "topics.php";

			echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
		} else {
			echo "this def does not work";
		}
	} else {
		echo "This does not work";
	}
} else {
	
}
?>





		<?php
		if (@$_GET['action'] == "logout") {
			session_destroy();
			//header("Location: login.php");


			$login = "login.php";

			echo "<script type='text/javascript'>document.location.href='{$login}';</script>";
		}
// This is verification
//		} else {
//			echo "You Must be logged in.". "<br />";
//			echo "<a href='login.php'> GO TO LOGIN</a>";
//			
//		}
		?>
	</body>

</html>