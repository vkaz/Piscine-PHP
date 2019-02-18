<?php
require_once '../ex01/Vertex.class.php';

	Class Vector {

		private $_x;
		private $_y;
		private $_z;
		private $_w = 0.0;
		static $verbose = False;

		public static function doc() {
			$doc = file_get_contents('Vector.doc.txt', FILE_USE_INCLUDE_PATH);
			return $doc.PHP_EOL;
		}
		function __construct(array $atr) {
           if (isset($atr['dest']) && $atr['dest'] instanceof Vertex) {
               if (isset($atr['orig']) && $atr['orig'] instanceof Vertex) {
                   $orig = new Vertex(array('x' => $atr['orig']->getX(), 'y' => $atr['orig']->getY(), 'z' => $atr['orig']->getZ()));
               }
               else {
                   $orig = new Vertex(array('x' => 0.0, 'y' => 0.0, 'z' => 0.0));
               }
				$this->_x = $atr['dest']->getX() - $orig->getX();
				$this->_y = $atr['dest']->getY() - $orig->getY();
				$this->_z = $atr['dest']->getZ() - $orig->getz();
				$this->_w = 0.0;
			}
			if (Self::$verbose) {
				print($this." constructed".PHP_EOL);
			}
		}
		function __destruct() {
			if (Self::$verbose) {
				print( $this." destructed".PHP_EOL);
			}
		}
		function  __toString() {
			return sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->getX(), $this->getY(), $this->getZ(), $this->getW());
		}
		public function magnitude() {
			return (float)(sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) +($this->_z * $this->_z)));
		}
		public function normalize() {
			$arr = $this->magnitude();
			return (new Vector(array('dest' => new Vertex(array('x' => $this->_x / $arr, 'y' => $this->_y / $arr, 'z' => $this->_z / $arr)))));
		}
		public function add(Vector $rhs) {
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z))));
		}
		public function sub(Vector $rhs) {
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z))));
		}
		public function opposite() {
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1))));
		}
		public function scalarProduct($k) {
			return new Vector(array('dest' => new Vertex(array('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k))));
		}
		public function dotProduct(Vector $rhs) {
			return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
		}
		public function crossProduct(Vector $rhs) {
            return new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->getZ() - $this->_z * $rhs->getY(), 'y' => $this->_z * $rhs->getX() - $this->_x * $rhs->getZ(), 'z' => $this->_x * $rhs->getY() - $this->_y * $rhs->getX()))));
        }
        public function cos(Vector $rhs) {
            return ((($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z)) / sqrt((($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->_x * $rhs->_x) + ($rhs->_y * $rhs->_y) + ($rhs->_z * $rhs->_z))));
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
	}
?>
