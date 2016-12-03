<?php
	session_start();
	unset($_SESSION["name"]);
	header('Refresh: 0; url=/');
	exit;
?>