<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>

<head>
    <meta charset="UTF-8">
    <title>| Topics |</title><meta name="viewport" content="width=device-width, initial-scale=1">
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




            <?php echo"<table class='table table-striped'"; ?>


            <thead class="thead-inverse">
                <tr>

                    <th><span>ID</span></th>


                    <th>
                        <center>Name</center>
                    </th>



                    <th>Creator</th>


                    <!--<th>Category</th> -->



                    <th>Date</th>


                </tr>
            </thead>










            <?php
//echo "<tr><td></td></tr>";
// changing the styles here to do something related to the categories

if ($_SESSION['cat_id'] == 1) {

	echo "<center>
		<img name='Pokeball' id='pokeball' src='../assets/images/145.png' class='img-responsive' alt='Pokemon Logo' width=100>
<h1 style='color:yellow; background-color:black;'>TEAM INSTINCT</h1></center>";
	echo "<style>body {
				background: #ffffe6 !important;
			}</style>";
	echo '<a href="index.php"><button class="btn btn-md btn-secondary btn-outline-warning ">Back to Forum</button></a>';
}

if ($_SESSION['cat_id'] == 2) {

	echo "<center>
		<img name='Pokeball' id='pokeball' src='../assets/images/146.png' class='img-responsive' alt='Pokemon Logo' width=100>
<h1 style='color:red; background-color:black;'>TEAM VALOR</h1></center>";
	echo "<style>body {
				background: #ffe6e6 !important;
			}</style>";
	
	echo '<a href="index.php"><button class="btn btn-md btn-secondary btn-outline-danger ">Back to Forum</button></a>';
}
if ($_SESSION['cat_id'] == 3) {

	
	
	echo "<center>
		<img name='Pokeball' id='pokeball' src='../assets/images/144.png' class='img-responsive' alt='Pokemon Logo' width=100>
<h1 style='color:#1E90FF; background-color:black;'>TEAM MYSTIC</h1>
</center>";
	echo "<style>body {
				background: #e6e6ff !important;
			}</style>";
	
	echo '<a href="index.php"><button class="btn btn-md btn-secondary btn-outline-info ">Back to Forum</button></a>';
}

?>

                <center>
                    <a href="topics.php?action=topics"><button class="btn btn-lg btn-secondary ">Create a topic</button></a>

                </center>






                <?php


$check = mysql_query("SELECT * FROM topics where fk_cat_id = '{$_SESSION['cat_id']}' ");

if (mysql_num_rows($check) != 0) {

	while ($row = mysql_fetch_assoc($check)) {




		$id = $row['topic_id'];
		echo "<tr>";
		echo "<td>" . $row['topic_id'] . "</td>";
		echo "<td><h5 id='topics'><center><a href='post_reply.php?id=$id'>" . $row['topic_name'] . "</a></center></h5></td>";
		echo "<td>" . $row['topic_user_name'] . "</td>";
		//echo "<td>" . $row['fk_cat_id'] . "</td>";
		echo "<td>" . $row['topic_date'] . "</td>";
		echo "</tr>";
	}
} else {
	echo "No topics found";
}


echo "</table>";
?>




                    <!--		<form action="topics.php" method="POST">

<center>

<input type="submit" name="submit" value="Post a Topic">
</center>


</form>-->



                    <?php
//echo "<tr><td></td></tr>";
echo "</table>";
?>

                        <?php

if (@$_GET['action'] == "topics") {

	
// For debugging use
//echo $id;


	//header("Location: post_topic.php");

	









	///// recovery place  
?>


                            <form class="form-signin" action="post_topic.php" method="POST">
                                <h2 class="form-signin-heading">Topic Name:</h2>


                                <input type="text" class="form-control" name="topic_name" placeholder="Write the topic name" required="" autofocus="" />
                                <br />



                                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="post">Post Topic</button>


                            </form>
                            <?php

}
?>

                            <?php
	//**************************************************************************
	////// Ths is the crucial part



//		if (isset($_POST['submit'])) {
//			
//			header("Location: post_topic.php");
//		}


if (@$_GET['action'] == "logout") {
	session_destroy();
	//header("Location: login.php");

	$login = "login.php";

	echo "<script type='text/javascript'>document.location.href='{$login}';</script>";
}
?>
</body>

</html>