<!-- index.php -->
<?php
setcookie("session", "", time()-3600);
setcookie("seat", "", time()-3600);
setcookie("name", "", time()-3600);
?>
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
			<p class="caption">Secret Wolf</p>
		</div>

		<div class="content">
			<form action="connect.php" method="post">
				<p>Session: <input type="text" name="session"/></p>
				<p>Seat: <input type="number" name="seat" /></p>
				<p>Name: <input type="text" name="name" /></p>
				<p> <input type="submit" class="inputbutton" value="Bestätigen"/></p>
			</form>
		</div>

	</div>

</body>
</html>
