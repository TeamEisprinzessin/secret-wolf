<?php

include "credentials.php";

$session = $_COOKIE['session'];

$mysqli = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	die("Connection failed: " . mysqli_connect_error());
}



$sql = $mysqli->prepare("SELECT * FROM $session");
$sql->execute();
$sql->store_result();

// $total = Gesamtanzahl Spieler
$total = $sql->num_rows;


// Identities: 0 = liberal; 1 = fascist; 2 = Hitler
// WARNING: VERY PROFESSIONAL ROLE GENERATION INCOMING!
if ($total == 5){
	$identities = [0,0,0,1,2];
} elseif ($total == 6){
	$identities = [0,0,0,0,1,2];
} elseif ($total == 7){
	$identities = [0,0,0,0,1,1,2];
} elseif ($total == 8){
	$identities = [0,0,0,0,0,1,1,2];
} elseif ($total == 9){
	$identities = [0,0,0,0,0,1,1,1,2];
} elseif ($total == 10){
	$identities = [0,0,0,0,0,0,1,1,1,2];
} else {
	echo("This Game shall only be played amongst a gathering of five to ten participants. Ple4se ch3ck ur numb0r5 m8");
}

shuffle($identities);
//var_dump($identities);
for ($i = 1; $i <= $total; $i++) {
	$ii = $i - 1;
	$currentrole = $identities[$ii];
	//echo($currentrole);
	//echo($session);
	//echo($i);
	$sql = "UPDATE $session SET identity=$currentrole WHERE id=$i";
	if(mysqli_query($mysqli, $sql)){
		echo "Player " . $i . ": Success!<br>";
	} else {
		echo "Player " . $i . ": Failure :(<br>";
	}
}



$mysqli->close();

 ?>
 <a href='game.php'>This Page should redirect automatically. Manually redirect here.</a>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
 <script type="text/javascript">
 window.location.replace('game.php');

 </script>
