<!-- index.php -->
<!DOCTYPE html>

<html lang="de">

<head>
	<meta charset="utf-8">
	<title>Secret Wolf</title>
	<meta name="description" content="Very Game, Much Secret, Many Awesome">

	<link rel="stylesheet" type="text/css" href="style.css" media="screen">
	<link href="https://fonts.googleapis.com/css?family=UnifrakturMaguntia" rel="stylesheet" type='text/css'>
</head>

<body>
	<div class="wrapper">

		<div class="header">
			<?php
			echo '<p>Session: ' . $_COOKIE['session'] . '</p>';
			echo '<p>Seat: ' . $_COOKIE['seat'] . '</p>';
			echo '<p>Name: ' . $_COOKIE['name'] . '</p>';
			?>
		</div>

		<div class="content">
			<!--Test-Chat-->
						<div id="chatbox"></div>
						<form name="message" action="">
							<input name="usermsg" type="text" id="usermsg" size="63" />
							<input name="submitmsg" type="submit" id="submitmsg" value="Send" />
						</form>

		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
		<script type="text/javascript">
		// jQuery Document
		$(document).ready(function(){
			var seat = readCookie('seat')
			var clientmsg = "Seat: " + seat + " - Joined the game";
			$.post("post.php", {text: clientmsg});
		});


		//If user submits the form
		$("#submitmsg").click(function(){
			var clientmsg = $("#usermsg").val();
			$.post("post.php", {text: clientmsg});
			$("#usermsg").attr("value", "");
		return false;

		});

		// get session variable
		function readCookie(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for (var i=0; i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}

		//Load the file containing the chat log
		function loadLog(){
			var sessionname = readCookie('session')
			$.ajax({
				url: "sessions/" + sessionname + ".html",
				cache: false,
				success: function(html){
					$("#chatbox").html(html); //Insert chat log into the #chatbox div
			  	},
			});
		}
		setInterval (loadLog, 1000);	//Reload file (in ms)

		</script>
	</div>
</body>
</html>
