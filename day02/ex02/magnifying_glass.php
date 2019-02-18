#!/usr/bin/php
<?php
if ($argc < 2 || !file_exists($argv[1]))
		exit();	
$file = fopen($argv[1], "r");
while (!feof($file))
{
	$line = fgets($file);
	$line = preg_replace_callback('/<a.*?title="(.*?)">/', function ($str) {
		return (str_replace($str[1], strtoupper($str[1]), $str[0]));
		}, $line);
	$line = preg_replace_callback('/<a.*?>(.*?)</', function ($str) {
		return (str_replace($str[1], strtoupper($str[1]), $str[0]));
		}, $line);
	 echo $line;
}
fclose($file);
?>