<?php
	function ft_is_sort($str) {
		$sort = $str;
		sort($sort);
		if ($sort == $str) {
			return (true);
		}
		else if ($sort != $str){
			return (false);
		}
	}
?>
