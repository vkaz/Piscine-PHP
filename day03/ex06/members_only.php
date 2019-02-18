<?php
	if ($_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == 'jaimelespetitsponeys') {
		$file = base64_encode(file_get_contents("../img/42.png"));
	echo "<html><body>\n";
	echo "Hello Zaz<br />\n";
	echo "<img src='data:image/png;base64,$file'>\n";
	echo "</body></html>\n";
}
	else {
	echo "<html><body>That area is accessible for members only</body></html>";
	header("WWW-Authenticate: Basic realm=''Member area''");
	header("HTTP/1.0 401 Unauthorized");
	header_remove("Authentication problem. Ignoring this.");
}
?>
