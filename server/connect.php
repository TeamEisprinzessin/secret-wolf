<!-- connect.php -->
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
			echo '<p>Session: ' . $_POST['session'] . '</p>';
			echo '<p>Seat: ' . $_POST['seat'] . '</p>';
			echo '<p>Name: ' . $_POST['name'] . '</p>';
			?>
		</div>

		<div class="content">
<?php

// Create Connection to MySQL-Database
include "credentials.php";
$session = $_POST['session'];
$seat = $_POST['seat'];
$name = $_POST['name'];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	die("Connection failed: " . mysqli_connect_error());
}



// Create Table in MySQL-Database
$sql = "CREATE TABLE $session (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(30) NOT NULL,
	seat INT(6),
	reg_date TIMESTAMP,
	identity INT(6)
)";
//Check if successfully created table
if ($mysqli->query($sql) === TRUE) {
	echo "Session " . $session . " successfully created.";
} else {
	//die("Error creating Session (table): " . $conn->error);
	echo "Session " . $session . " succesfully joined."; // Yeah I know it's not pretty...
}


// Write into Database
if ($stmt = $mysqli->prepare("INSERT INTO $session (name, seat, identity) VALUES (?, ?, 0)")) {
	/* Bind the variables to the parameter as strings */
	$stmt->bind_param("ss", $name, $seat);
	$stmt->execute();
	$stmt->close();
}

// Close Connection
$mysqli->close();

// Write Player information into cookies
setcookie("session", $session, time()+86400);
setcookie("seat", $seat, time()+86400);
setcookie("name", $name, time()+86400);
?>

<p><a href="pregame.php">AUF IN DEN KAMPF, TORERO</a></p>
</div>

</div>

</body>
</html>
