<?php
	Class NightsWatch {
		private $arr = array();
		public function recruit($a) {
			$this->arr[] = $a;
		}
		function fight() {
			foreach ($this->arr as $a) {
				if (method_exists(get_class($a), 'fight')) {
					$a->fight();
				}
			}
		}
	}
?>
