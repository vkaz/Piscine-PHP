<?php
	require_once "../ex00/Color.class.php";
	Class Vertex {
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1;
		private $_color;
		static $verbose = False;

		public static function doc() {
			$doc = file_get_contents('Vertex.doc.txt', FILE_USE_INCLUDE_PATH);
			return $doc;
		}
		function __construct(array $atr) {
			$this->_x = $atr['x'];
			$this->_y = $atr['y'];
			$this->_z = $atr['z'];
			if (isset($atr['w'])) {
				$this->_w = $atr['w'];
			}
			if (isset($atr['color'])) {
				$this->_color = $atr['color'];
			}
			else {
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
			}
			if (Self::$verbose) {
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			}
		}
		function __destruct() {
		if (Self::$verbose) {
			print( $this . " destructed" . PHP_EOL);
		}
		}
		function  __toString() {
			if (Self::$verbose){
				return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
			}
			return sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
		}
		public function getX() {
			return $this->_x;
		}
		public function getY() {
			return $this->_y;
		}
		public function getZ() {
			return $this->_z;
		}
		public function getW() {
			return $this->_w;
		}
		public function getColor() {
			return $this->_color;
		}
		public function setX($x) {
			$this->_x = $x;
		}
		public function setY($y) {
			$this->_y = $y;
		}
		public function setZ($z) {
			$this->_z = $z;
		}
		public function setW($w) {
			$this->_w = $w;
		}
		public function setColor($color) {
			$this->_color = $color;
		}
	}
?>
