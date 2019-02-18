<?php
	Class UnholyFactory {
		private $arr = array();
		public function absorb($a) {
			if (get_parent_class($a)) {
				if (isset($this->arr[$a->getName()])) {
					print("(Factory already absorbed a fighter of type ".$a->getName().")".PHP_EOL);
				}
				else {
					print("(Factory absorbed a fighter of type ".$a->getName().")".PHP_EOL);
					 $this->arr[$a->getName()] = $a;
				}
			}
			else {
				print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
			}
		}
		public function fabricate($a) {
			if (array_key_exists($a, $this->arr)) {
				print("(Factory fabricates a fighter of type " .$a. ")".PHP_EOL);
				return $this->arr[$a];
			}
			print("(Factory hasn't absorbed any fighter of type " .$a. ")".PHP_EOL);
            return null;
		}
	}
?>
