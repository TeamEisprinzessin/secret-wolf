<?php

include "credentials.php";
$session = $_COOKIE['session'];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	die("Connection failed: " . mysqli_connect_error());
}

// TO-DO: Code to somehow assign a role to every member of parliament coming soon(tm)
// Identities: 0 = liberal; 1 = fascist; 2 = Hitler
// 5-10 Players
// 5-6: 21000(0)
// 7-8: 2110000(0)
// 9-10: 2111000(0)

$mysqli->close();
 ?>
