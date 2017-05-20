<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>
    <head>
        <meta charset="UTF-8">
        <title>| Replies |</title>
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
				//max-width: 380px;
				padding: 15px 35px 45px;
				margin: 0 auto;
				//background-color: #fff;
				//border: 1px solid rgba(0, 0, 0, 0.1);
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
			//echo$_SESSION["cat_id"];
			?>


			<!--
	  THIS IS WHERE THE CONTENT OF THE HTML WILL GO

			-->

			<script>
	            function reload() {
	                location.reload();
	            }
			</script>












			<?php
			if ($_GET['id']) {


				$query = mysql_query("SELECT * FROM topics WHERE topic_id= '{$_GET['id']}'");

				if (mysql_num_rows($query)) {


					while ($row = mysql_fetch_assoc($query)) {

						$topicID = $row['topic_id'];

						//echo $topicID;
						//echo $_SESSION['topic_id'];
						echo "<center><h1><strong>" . $row['topic_name'] . "</strong></h1></center><br />";
						echo "<center><h5>" . "Created by " . $row['topic_user_name'] . "<br />" .
						$row['topic_date'] . "</h5></center><br />";


						
					}
					// END OF THE HEADER
					?>


					<?php
				} else {

					echo "Topic not Found.";
				}
			} else {
				
			}
			?>



			<a href="topics.php"><button class="btn btn-md btn-secondary">Back to topics</button></a>

		

			<?php echo"<table class='table table-striped table-inverse'"; ?>

	<tr>



			<td class="bg-info">
				Post Content
			</td>


			<td class="bg-info">
				User
			</td>

			<td class="bg-info">
				Date
			</td>

		</tr>








		<?php
		//echo "<tr><td></td></tr>";
		if ($_SESSION['cat_id'] == 1) {


		echo "<style>body {
				background: #ffffe6 !important;
			}</style>";
	}

	if ($_SESSION['cat_id'] == 2) {


		echo "<style>body {
				background: #ffe6e6 !important;
			}</style>";
	}
	if ($_SESSION['cat_id'] == 3) {


		echo "<style>body {
				background: #e6e6ff !important;
			}</style>";
	}



	$check = mysql_query("SELECT * FROM posts WHERE post_topic = '{$topicID}' ;");

		if (mysql_num_rows($check) != 0) {

		while ($row = mysql_fetch_assoc($check)) {

			echo "<tr>";

			echo "<td class='lead'>"  . $row['post_content'] . "</td>";
			echo "<td>" . $row['post_userName'] . "</td>";
			echo "<td>" . $row['post_date'] . "</td>";

			echo "</tr>";
		}
	} else {
		echo "No replies for this topic";
		}


		echo "</table>";
		?>



		


		<form class='form-signin' action='post_reply.php?id=<?php echo $topicID ?>' method='POST'>
			<h4 class="form-signin-heading">Reply</h4>

			<input type="text" class="form-control" name="post_content" placeholder="Write your reply right here" />


			<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="post">Post Your Reply</button>



		</form>




	<?php
	$post_content = @$_POST['post_content'];
	$date = date("Y-m-d");




	if (isset($_POST['submit'])) {

		if (@$post_content) {

			if (strlen($post_content) >= 5 && strlen($post_content) <= 70) {

				$query1 = "INSERT INTO posts(post_content, post_topic, post_fk_cat, post_date, post_userName)"
						. "VALUES('{$post_content}', '{$topicID} ', '{$_SESSION['cat_id']}', '{$date}', '{$_SESSION['userName']}');";

				if (!mysql_query($query1)) {

					die('Error: ' . mysql_error());
				} else {

					echo "<center><h2>You have replied to this topic</h2</center>  ";
					//
					//header("Refresh:0");

					$URL = "post_reply.php?id=$topicID";

					echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				}
			} else {

				echo "your reply is too short or too long :)";
			}
		} else {

			echo "the empty not working";
		}
	} else {

		//echo "Not working";
	}
	?>




		<?php
//	if (isset($_POST['submit'])) {
//
//		header("Location: post_topic.php");
//	}


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
