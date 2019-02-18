#!/usr/bin/php
<?php
	if (count($argv) != 4)
	{
		echo("Incorrect Parameters\n");
		return;
	}
	if (trim($argv[2]) == "+")
		echo(trim($argv[1]) + trim($argv[3]));
	else if (trim($argv[2]) == "-")
		echo(trim($argv[1]) - trim($argv[3]));
	else if (trim($argv[2]) == "*")
		echo(trim($argv[1]) * trim($argv[3]));
	else if (trim($argv[2]) == "/")
		echo(trim($argv[1]) / trim($argv[3]));
	else if (trim($argv[2]) == "%")
		echo(trim($argv[1]) % trim($argv[3]));
	echo("\n");
?>
