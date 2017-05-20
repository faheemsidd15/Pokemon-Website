<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>


		<!-- Importing Bootstrap -->

		<link rel="shortcut icon" href="images/favicon.ico">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



		<link rel="stylesheet" href="../css/styeSheet.css" />
		<link rel="stylesheet" href="../assets/css/style.css" />
		<link rel="stylesheet" href="../assets/css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="../assets/css/Bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/bootstrap.css" />
		<script src="../assets/jquery-1.11.0.js" type="text/javascript"></script>
		<script src="../assets/bootstrap.min.js" type="text/javascript"></script>
		<link rel="styleSheet" href="../assets/jquery.mobile-1.4.2/jquery.mobile-1.4.2.css" />
<!--		<script src="assets/jquery.mobile-1.4.2/jquery.mobile-1.4.2.js" type="text/javascript"></script>-->




		<script>
            function getPokemonData(name) {
            var serviceUrl =
                    "http://pokeapi.co/api/v2/pokemon/" + name;

            $.getJSON(serviceUrl, function (data) {
                console.log(data);

                /*This is for all the attributes*/
                /*$(".attributes").css("border", "1px solid #000000");*/
                //$("#spr").html("Sprite:    " + data.sprites);

                //$("#spr").html("img link: " + data.sprites.front_default);
				
				$img2 = $("<img width='50px'>");
				$img2.attr({"src": data.sprites.front_default});
				
				$("#history").append($img2);
				
                $img = $("<img width='140px'>");
                $img.attr({"src": data.sprites.front_default});
                //$("#spr").append($img);  ***** VERY IMPORTANT DO NOT DELETE THIS WILL SHOW ALL THE ONES CLICKED
               
			   
			   
				$("#spr").html($img);
                $("#id").html("ID Number:    " + data.id);
                $("#name").html("Name:    " + data.name);
                $("#baseExperience").html("Base Experience:  " + data.base_experience);
                $("#height").html("Height:  " + data.height);
                $("#weight").html("Weight:  " + data.weight);
                $("#abilities").html("Special Ability:  " + data.abilities[1].ability.name);
                $("#abilitiesHidden").html("Hidden Ability:  " + data.abilities[0].ability.name);
                if (data.moves) {
                    var movesData = '<b>Moves:</b><br />';
                    for (var i = 0; i < 4; i++) {
                        movesData += data.moves[i].move.name + "<br />";
                    }
                    $("#moves").html(movesData);
                }
                /*
                 for (var i = 0; i <= 3; i++) {
                 $("#moves").append("~ " + data.moves[i].move.name);
                 
                 } /*Add more elements*/

                $("#type1").html("Type 1:  " + data.types[0].type.name);
                $("#type2").html("Type 2:  " + data.types[1].type.name);
                $('html, body').animate({
                    scrollTop: 0
                }, 2000);

            });

        }
            
            
            
            
            
// This is for the rotation Animation
            
            var looper = null;
            var degrees = 0;

            function rotateAnimation(el, speed) {
                var elem = document.getElementById(el);
                if (navigator.userAgent.match("Chrome")) {
                    elem.style.WebkitTransform = "rotate(" + degrees + "deg)";
                } else if (navigator.userAgent.match("Firefox")) {
                    elem.style.MozTransform = "rotate(" + degrees + "deg)";
                } else if (navigator.userAgent.match("MSIE")) {
                    elem.style.msTransform = "rotate(" + degrees + "deg)";
                } else if (navigator.userAgent.match("Opera")) {
                    elem.style.OTransform = "rotate(" + degrees + "deg)";
                } else {
                    elem.style.transform = "rotate(" + degrees + "deg)";
                }
                if (looper != null) {
                    clearInterval(looper);
                    looper = null;
                    // elem.style.transform = "rotate(0deg)";
                    // rotate back to zero
                }

                looper = setTimeout('rotateAnimation(\'' + el + '\',' + speed + ')', speed);
                degrees++;
                if (degrees > 359) {
                    degrees = 1;
                }

            }




		</script>	









    </head>
    <body>
		<!--		<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">WebSiteName</a>
						</div>
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="#">Page 1</a></li>
							<li><a href="#">Page 2</a></li> 
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
						</ul>
					</div>
				</nav>-->
		<?php
		// put your code here
		?>

		<div data-role="header">





			<!--This is the main logo-->

			<!--end of main logo-->


			<!----------Spinning Pokeball-->




			<!---------------------End of Spinning Pokeball-->


			<nav class="navbar navbar-inverse">


				<div class="container-fluid">



					<div class="navbar-header">
						<a href="../index.html">
							<img name="PokeMonLogo2" id="pokLogo2" src="../assets/images/200px-English_Pok%C3%A9mon_logo.png" class="img-responsive	" alt="Pokemon Logo" width="120"></a>
						<script>
                            //rotateAnimation("pokeLogo2",1)
						</script>



						<a href="../index.html">
							<img name="Pokeball" id="pokeball" src="../assets/images/pokeball.png" class="img-responsive" alt="Pokemon Logo" width=87></a>
						<script>
                            rotateAnimation("pokeball", 3);
						</script>


					</div>

					<ul class="nav navbar-nav">
						<!--<li class="active"><a href="#">| HOME |</a></li> -->


						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="pokedex1.php">PokeDex
							</a><span class="caret"></span>   
							<ul class="dropdown-menu">
								<li><a href="pokedex1.php">Gen 1/ Kanto League</a></li>
								<li><a href="pokedex2.php">Gen 2/ Johto League</a></li>
								<li><a href="pokedex3.php">Gen 3/ Hoenn League</a></li>
								<li><a href="pokedex4.php">Gen 4/ Sinnoh League</a></li>
								<li><a href="pokedex5.php">Gen 5/ Unova League</a></li>
								<li><a href="pokedex6.php">Gen 6/ Kalos League</a></li>

							</ul>
						</li>

						<li><a href="index.php">PokeForum</a></li>



						<li><a href="members.php">PokeMembers</a></li>





					</ul>

					<ul class="nav navbar-nav navbar-right">
						<?php
						if (isset($_SESSION['userName'])) {
							
							$check = mysql_query("SELECT * FROM users WHERE userName = '{$_SESSION['userName']}'");
							$rows = mysql_num_rows($check);
							
							while ($row = mysql_fetch_assoc($check)) {
								
								$profile_id = $row['id'];
							}
							
							echo "<li class='lead'><a href='profile.php?id=$profile_id'>";
							echo "Welcome "  . @$_SESSION['userName'] . "</a></li>";


							echo '<li><a href="account.php">My account settings</a></li>';

							echo '<li><a href="index.php?action=logout">Logout</a></li>';
						} else {

							echo'<li><a href="signUp.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
						}
						?>


					</ul>


				</div>

			   <!-- <input type="text" id="txtSearch" value="" /> -------->
                <table><th id="history"></th></table>	


			</nav>

		</div> <!-- End of header ----------------->


    </body>

</html>
