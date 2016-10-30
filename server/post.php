<?php
session_start();
if(isset($_COOKIE['name'])){
  $text = $_POST['text'];
  $filename = "sessions/" . $_COOKIE["session"] . ".html";
  $fp = fopen($filename, 'a');
  fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_COOKIE['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
  fclose($fp);
}

?>
