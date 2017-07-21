<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>
    <head>
        <meta charset="UTF-8">
        <title>| Posting Topic |</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Importing Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
		<?php
		//************************************* PHP***************************
		// put your code here
		// Start the session and always require the connect.php


		session_start();
		require 'connect.php';

		// Check to see if the user is logged in within the session
		if (@$_SESSION["userName"]) {


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
			?>


			<!--
	  THIS IS WHERE THE CONTENT OF THE HTML WILL GO
			-->













			<br/>
			<br />








			<?php
			//create variables

			$topic_name = @$_POST['topic_name'];
			$post_content = @$_POST['post_content'];
			$date = date("Y-m-d");







			if (isset($_POST['submit'])) {
				if ($topic_name) { // There is a bug here that lets you post topics but not 
					if (strlen($topic_name) >= 10 && strlen($topic_name) <= 70) {

						// this is true in this space
						//	if($query = mysql_query("INSERT INTO topics(topic_name, topic_user_name, fk_user_id,
						//fk_cat_id, topic_date)" . "VALUES('{$topic_name}', '{$_SESSION['userName']}', ' ', '{$_SESSION['cat_id']}'  )




						$query = "INSERT INTO topics(topic_name, topic_user_name, fk_user_id,
			fk_cat_id, topic_date)" .
								"VALUES('{$topic_name}', '{$_SESSION['userName']}', ' ', '{$_SESSION['cat_id']}', '{$date}');";




						if (!mysql_query($query)) {

							die('Error: ' . mysql_error());
						} else {
							echo "<center><h2>You have successfully posted</h2</center>  " . "'$topic_name'";
							echo "<br />";
							echo"<center><h2><a href='topics.php'>Back to topics</a></h2</center>";
							echo "<br />";
							//header("Location:topics.php");
							
							$URL = "topics.php";

						echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
						}
					} else {

						echo "Topic Name characters between 10 and 70";
					}
				} else {

					echo "Please fill in all the fields";
				}
			}


			//**************************************************************************

			echo "<br />";
			echo "<br />";
			echo "<br />";









//*************************************************************************
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
