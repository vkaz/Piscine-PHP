#!/usr/bin/php
<?php
	if ($argc > 1) {
		$str = $argv[1];
		$str = trim($str);
		$str = preg_replace("/[\t\s]+/", ' ', $str);
		echo "$str"."\n";
	}
?>
