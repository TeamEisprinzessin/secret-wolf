<html>
<head>
</head>

<body>
<?php


// Create Connection to MySQL-Database
include "credentials.php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)  {
	die("Connection failed: " . $conn->connect_error);
}

// Variables written into MySQL
$user		= 'testuser';
$message	= 'How Can Mirrors Be Real If Our Eyes Arent Real';
// WARNING/To-Do: Problems with Apostrophes etc. for writing into MySQL

// Write into Database
$sql = "INSERT INTO test (user, message)
VALUES ('$user', '$message')";

// Check Connection
if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close Connection
$conn->close();



?>



</body>
</html>
