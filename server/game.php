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

		</div>

	</div>
</body>
</html>
