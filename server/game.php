<html>
<body>
THIS IS THE NEW GAME! ITS AWESOME
<?php
if(!isset($_COOKIE['username']))  {
	print 'Cookie doesnt exist';
} else  {
	print 'Cookie exists';
}
echo $_COOKIE['username'];
?>
</body>
</html>
