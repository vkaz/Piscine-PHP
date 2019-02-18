<?php
	function ft_split($line)
	{
		$str = explode(" ", $line);
		$str = array_filter($str);
		if ($str != NULL){
			sort($str);
		}
		return ($str);
	}
?>
