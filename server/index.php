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



$conn->close();





echo "test";


?>



</body>
</html>
