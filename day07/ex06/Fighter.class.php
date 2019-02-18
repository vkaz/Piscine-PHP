<?php
	Class Fighter {
		private $str;
		function __construct($n) {
			$this->str = $n;
		}
		function getName() {
			return $this->str;
		}
	}
?>
