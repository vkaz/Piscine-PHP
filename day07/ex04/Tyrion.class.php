<?php
	Class Tyrion {
		public function sleepWith($t) {
			if ($t instanceof Jaime) {
				print("Not even if I'm drunk !".PHP_EOL);
			}
			elseif ($t instanceof Sansa) {
				print("Let's do this.".PHP_EOL);
			}
			elseif ($t instanceof Cersei) {
				print("Not even if I'm drunk !".PHP_EOL);
			}
		}
	}
?>
