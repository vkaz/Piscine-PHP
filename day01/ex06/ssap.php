#!/usr/bin/php
<?php	
	unset($argv[0]);
	$str2 = array();
	$i = 0;
	while (++$i < $argc){
		$str = $argv[$i];
		$str1 = explode(" ", $str);
		$str2 = array_merge($str2, $str1);
	}
	sort($str2);
	foreach ($str2 as $str3) {
		echo "$str3\n";
	}
?>
