<!-- post.php -->
<?php
session_start();
if(isset($_COOKIE['name'])){
  $text = $_POST['text'];

  if (!file_exists('sessions/')) {
  	mkdir('sessions/', 0777, true);
  }

  $filename = "sessions/" . $_COOKIE["session"] . ".html";
  $fp = fopen($filename, 'a');
  fwrite($fp, "<div>(".date("g:i A").") <b>".$_COOKIE['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
  fclose($fp);
}

?>
