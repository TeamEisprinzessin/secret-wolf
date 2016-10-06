<html>
<head>
</head>

<body>
<?php


// Create Connection to MySQL-Database
include "credentials.php";

$gamename = $_POST['gamename'];
$gameusername = $_POST['username'];
$playernumber = $_POST['playernumber'];
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)  {
	die("Connection failed: " . $conn->connect_error);
}

//if ($result = $mysqli->query("SHOW TABLES LIKE '".$gamename."'")) {
//		if ($result->num_rows == 1) {
//		echo "Spiel beigetreten";
//		}
//		echo "Test";
//	} else {
// sql to create table
$sql = "CREATE TABLE $gamename (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
playernumber INT(6),
reg_date TIMESTAMP
)";
	//Check if successfully created table
		if ($conn->query($sql) === TRUE) {
    		echo "Spiel " . $gamename . "erfolgreich erstellt.";
			} else {
    		//echo "Error creating game (table): " . $conn->error;
			}
//}



// Variables written into MySQL
//$message	= 'How Can Mirrors Be Real If Our Eyes Arent Real';
// WARNING/To-Do: Problems with Apostrophes etc. for writing into MySQL

// Check if variables already exist in table of database
$sql = "SELECT id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {}

// Write into Database

$sql = "INSERT INTO $gamename (username, playernumber)
VALUES ('$gameusername', '$playernumber')";

// Check Connection
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close Connection
$conn->close();
setcookie("username", $gameusername, time()+86400);

if(!isset($_COOKIE['username'])) {
	print 'Cookie doesnt exist';
} else{
	print 'Cookie exists';
}
echo $_POST[''];

?>
<p><a href="game.php">AUF IN DEN KAMPF, TORERO</a></p>
</body>


</html>
