<?php
  session_start();
  require_once('vk_auth.php');

  if(isset($_SESSION["name"])) {
    echo $_SESSION["name"]." ".$_SESSION["last_name"]."<br /><a href='logout.php'>Logout</a>";
  } else {
    echo $link = '<a href="' . $url . '?' . urldecode(http_build_query($params)) . '"><span>Войти</span></a>';
  }
?>