<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>
    <head>
        <meta charset="UTF-8">
        <title>|Login|</title>

        <!-- Importing Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



		<link rel="stylesheet" href="../assets/css/Bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<script src="../assets/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="../assets/bootstrap.min.js" type="text/javascript"></script>
		<link rel="styleSheet" href="../assets/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css" />


		<!-- Using a Bootstrap theme this can later be changed -------------->

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
                border: 1px solid rgba(0,0,0,0.1);  

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
// Always need to start the sesstion
// Starting php
// Using require connect.php

		session_start();

		require 'connect.php';


		$userName = @$_POST['userName'];
		$password = @$_POST['password'];
		$id = @$_POST['id'];

		if (isset($_POST['submit'])) {

			if ($userName && $password) {
				$val = mysql_query("SELECT * FROM users WHERE userName = '{$userName}'");
				$rows = mysql_num_rows($val);

				if (mysql_num_rows($val) != 0) {

					//echo "Username found"; --  This is to see if this statement is working

					while ($row = mysql_fetch_assoc($val)) {
						$db_userName = $row['userName'];
						$db_password = $row['password'];
					}

					if ($userName == $db_userName && sha1($password) == $db_password) {


						@$_SESSION["userName"] = $userName;



						header("Location: index.php");
					} else {

						echo"Your password cannot be validated.";
					}
				} else {

					die("Couldnt find username");
				}
			} else {
				echo"<center><h3>Please Fill in all the Fields</h3></center>";
			}
		}
		?>



		<div class="wrapper">
            <form class="form-signin" action="login.php" method="POST"> 
				<img name="PokeMonLogo2" id="pokLogo2" src="../assets/images/200px-English_Pok%C3%A9mon_logo.png" class="img-responsive" alt="Pokemon Logo">


				<img name="Pokeball" id="pokeball" src="../assets/images/pokeball.png" class="img-responsive" alt="Pokemon Logo" width=100>
                <script>
                    rotateAnimation("pokeball", 5);
                </script>
				<br>

				<h2 class="form-signin-heading">Login to PokeForum</h2>

                <input type="text" class="form-control" name="userName" placeholder="User Name" required="" autofocus="" /><br />
                <input type="password" class="form-control" name="password" placeholder="Password" required=""/><br />



                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Enter</button>  <br />

                <button class="btn btn-lg btn-primary btn-block" type="reset"> Reset</button> <br />

                <a href="signUp.php" class="btn btn-lg btn-secondary btn-block"> Don't have have an account?<br/> Sign-Up</a>
            </form>
        </div>

	</body>	
</html>
