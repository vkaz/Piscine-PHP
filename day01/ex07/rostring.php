#!/usr/bin/php
<?php
	if (count($argv) < 2)
		return ;
	unset($argv[0]);
	$str = $argv[1];
	$str = trim(preg_replace('/\s+/', ' ', $str));
	$pos = strpos($str, ' ');
	$rest = substr($str.PHP_EOL, 0, $pos);
	$rest1 = trim(mb_strcut($str, $pos));
	if ($rest != NULL) {
		echo $rest1." ".substr($str, 0, $pos).PHP_EOL;
	}
	else {
		echo $rest1.PHP_EOL;
	}
?>
