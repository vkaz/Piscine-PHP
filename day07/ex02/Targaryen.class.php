<?php
	Class Targaryen {
		public function getBurned() {
			if (!$this->resistsFire()){
				return "burns alive";
			}
		return "emerges maked but unharmed";
		}
		public function resistsFire() {
			return false;
		}
	}
?>
