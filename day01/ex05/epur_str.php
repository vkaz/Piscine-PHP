#!/usr/bin/php
<?php
	if (count($argv) != 2)
		return ;
	$str = $argv[1];
	$str = trim($str);
	$str = preg_replace('/\s+/', ' ', $str);
	echo ($str.PHP_EOL);
?>
