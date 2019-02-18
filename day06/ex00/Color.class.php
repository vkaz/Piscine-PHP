<?php
	Class Color {
		public $red;
		public $green;
		public $blue;
		static $verbose = False;

		public static function doc() {
			$doc = file_get_contents('Color.doc.txt', FILE_USE_INCLUDE_PATH);
			return $doc;
		}
		function __construct(array $color) {
			if (isset($color['red']) && isset($color['green']) && isset($color['blue'])) {
				$this->red = intval($color['red']);
				$this->green = intval($color['green']);
				$this->blue = intval($color['blue']);
			}
			else if (isset($color['rgb'])){
				$this->red = intval(($color['rgb'] & 0xFF0000) >> 16);
				$this->green = intval(($color['rgb'] & 0x00FF00) >> 8);
				$this->blue = intval($color['rgb'] & 0x0000FF);
			}
			if (Self::$verbose) {
			print($this. " constructed.".PHP_EOL);
		}
		}
		function __destruct() {
			if (Self::$verbose)
				printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
		}
		public function add($add) {
			return (new Color(array('red' => $this->red + $add->red, 'green' => $this->green + $add->green, 'blue' => $this->blue + $add->blue)));
		}
		public function sub($sub) {
			return (new Color(array('red' => $this->red - $sub->red, 'green' => $this->green - $sub->green, 'blue' => $this->blue - $sub->blue)));
		}
		public function mult($mult) {
			return (new Color(array('red' => $this->red * $mult, 'green' => $this->green * $mult, 'blue' => $this->blue * $mult)));
		}
		function  __toString() {
			return sprintf("Color( red: %3d, green: %3d, blue: %3d )"
					   , $this->red, $this->green, $this->blue);
		}
	}
?>
