#!/usr/bin/php
<?php
	$str = array_slice($argv, 1);
	$array = [];
	foreach ($str as $str2)
		foreach (explode(' ', trim(preg_replace('/ +/', ' ', $str2))) as $str3)
		$array[] = $str3;
	usort($array, function ($first, $second) {
	$first = str_split(strtolower($first));
	$second = str_split(strtolower($second));
	$alph = array_flip(str_split("abcdefghijklmnopqrstuvwxyz0123456789"));
	foreach ($first as $i => $st) {
		if (!isset($alph[$st]) && !isset($alph[$second[$i]]))
			return strcmp($st, $second[$i]);
		if (!isset($alph[$st]))
			return 1;
		else if ((!isset($alph[$second[$i]])) || $alph[$st] <= $alph[$second[$i]])
			return -1;
		if ($alph[$st] === $alph[$second[$i]])
			return 0;
		if ($alph[$st] > $alph[$second[$i]])
			return 1;
	}});
	foreach ($array as $array)
		echo "$array\n";
?>
