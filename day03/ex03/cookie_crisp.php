<?php
	if (!isset($_GET["action"]) || !isset($_GET["name"]))
		return (0);
	$c_n = $_GET["name"];
	if ($_GET["action"] == "set") {
		setcookie($c_n, $_GET["value"]);
	}
	else if ($_GET["action"] == "get") {
		echo ($_COOKIE[$_GET["name"]])."\n";
	}
	else if ($_GET["action"] == "del") {
		setcookie($c_n, NULL, time() - 3600);
	}
?>
