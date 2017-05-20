<!DOCTYPE html>
<!-------------------------------------Faheem Siddiqui-------------------------->

<html>

	<head>
		<meta charset="UTF-8">
		<title>| PokeDex |</title>
		<!-- Importing Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>


		</style>
	</head>

	<?php
	//*************************************PHP***************************
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
	?>
	<script>

        function reload() {
            location.reload();
        }


        $(document).ready(function () {
            /*Add more images here */
            for (var i = 387; i <= 494; i++) {
                $pokemonImg = $('<img>');
                var imgNumSeq = '00' + i;
                imgNumSeq = imgNumSeq.substr(imgNumSeq.length - 3);
                // console.log(imgNumSeq);

                $pokemonImg.attr('src', 'assets/images/' + imgNumSeq + '.png');
                $pokemonImg.attr('class', 'pokImg');
                $pokemonImg.attr('id', i);
                $pokemonImg.click(function (evt) {
                    // console.log(evt.target.id); 
                    getPokemonData(evt.target.id)

                    rotateAnimation(evt.target.id, 2);

                });
                $('#pokemonImages').append($pokemonImg);

            }

            $("#btnSearch").click(function () {
                var name = $("#txtSearch").val();
                getPokemonData(name);
                localStorage.setItem("chosen", name);
                $(".attributes").css(name);

                /*
                 $("#imageButton").click(function () {
                 var imgName = $("#imgSearch")
                 getPokemonImage(imgName);
                 })*/
            });

        });



        function getPokemonData(name) {
            var serviceUrl =
                    "http://pokeapi.co/api/v2/pokemon/" + name

            $.getJSON(serviceUrl, function (data) {
                console.log(data);

                /*This is for all the attributes*/
                /*$(".attributes").css("border", "1px solid #000000");*/
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



        /*function getPokemonImage(imgName){
         var flickerAPI = "http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?" + imgName;
         $.get(flickerAPI,function(data) {
         
         console.log(data);
         
         $("<img>").attr("src", item.media.m).appentTo("#searchPokImage");
         });
         }*/
	</script>






	<body>

		<!--
THIS IS WHERE THE CONTENT OF THE HTML WILL GO
		-->
<!-- This is a cool button too
<input type="text" class="form-control" id="txtSearch" value="" />
		<input type="button" id="btnSearch" class="btn btn-primary" value="Search Pokemon" />-->


	<div class="input-group">
			<input type="text" class="form-control" id="txtSearch" value="" placeholder="Search Pokemon here">
			<div class="input-group-btn">
				<button class="btn btn-primary" id="btnSearch" value="Search Pokemon">
					<i class="glyphicon glyphicon-search"></i>
				</button>
			</div>
		</div>	

		
		<div class="container-fluid">
			
			<div class="sprites" id = "spri">

			<div id="history"></div>
				<center><div id="spr"></div></center>
			</div>

			<div class="attributes" id="pokemonAttr">
				<div id="id"></div>
				<div id="name"></div>
				<div id="type1"></div>
				<div id="type2"></div>
				<div id="baseExperience"></div>
				<div id="height"></div>
				<div id="weight"></div>
				<div id="abilities"></div>
				<div id="abilitiesHidden"></div>
				<div id="moves"></div>
			</div>
		</div>



	





		<div id="header2">
			<h3> Click on any Pokemon for stats</h3></div>
	<center><h1 class="lead">Sinnoh League</h1></center>

	<div id="pokemonImages"></div>






	<?php
	if (@$_GET['action'] == "logout") {
		session_destroy();
		//header("Location: login.php");

		$login = "login.php";

		echo "<script type='text/javascript'>document.location.href='{$login}';</script>";
	}
	?>
</body>

</html>