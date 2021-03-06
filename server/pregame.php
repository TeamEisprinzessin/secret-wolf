<!-- pregame.php -->
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
						<a href="destiny.php">Enter Game</a>

		</div>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
		<script type="text/javascript">

		// javascript and php code related to writing and reading the chat log is modified from this tutorial: "https://code.tutsplus.com/tutorials/how-to-create-a-simple-web-based-chat-application--net-5931"

		// Write "...Joined the game"-Message
		$(document).ready(function(){
			var seat = readCookie('seat')
			var clientmsg = "Seat: " + seat + " - Joined the game";
			$.post("post.php", {text: clientmsg});
		});

		// Write Custom Message on Form-Submit
		$("#submitmsg").click(function(){
			var clientmsg = $("#usermsg").val();
			$.post("post.php", {text: clientmsg});
			$("#usermsg").attr("value", "");
			return false;
		});

		// Way too complicated function to read cookies in javascript
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

		// Load the file containing the chat log (sessions/[session].html)
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
