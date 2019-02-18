<?php
Class Matrix {
		static $verbose = False;

		protected $matrix = array();
		private $_preset;
		private $_scale;
		private $_angle;
		private $_vtc;
		private $_fov;
		private $_ratio;
		private $_near;
		private $_far;

		const IDENTITY = 'IDENTITY';
		const TRANSLATION = 'TRANSLATION';
		const SCALE = 'SCALE';
		const RX = 'RX';
		const RY = 'RY';
		const RZ = 'RZ';
		const PROJECTION = 'PROJECTION';

		public static function doc() {
			$doc = file_get_contents('Matrix.doc.txt', FILE_USE_INCLUDE_PATH);
			return $doc.PHP_EOL;
		}
		public function __construct($atr = null) {
			if (isset($atr)) {
				if (isset($atr['preset']))
					$this->_preset = $atr['preset'];
				if (isset($atr['scale']))
					$this->_scale = $atr['scale'];
				if (isset($atr['angle']))
					$this->_angle = $atr['angle'];
				if (isset($atr['vtc']))
					$this->_vtc = $atr['vtc'];
				if (isset($atr['fov']))
					$this->_fov = $atr['fov'];
				if (isset($atr['ratio']))
					$this->_ratio = $atr['ratio'];
				if (isset($atr['near']))
					$this->_near = $atr['near'];
				if (isset($atr['far']))
					$this->_far = $atr['far'];
				if (Self::$verbose) {
					if ($this->_preset == Self::IDENTITY) {
							echo "Matrix ".$this->_preset." instance constructed".PHP_EOL;
					}
					else {
							echo "Matrix ".$this->_preset." preset instance constructed".PHP_EOL;
					}
				}
				$this->go();
			}
		}
		function __destruct() {
			if (Self::$verbose) {
				print("Matrix instance destructed".PHP_EOL);
			}
		}
		function  __toString() {
			$tmp = "M | vtcX | vtcY | vtcZ | vtxO\n";
			$tmp .= "-----------------------------\n";
			$tmp .= "x | %0.2f | %0.2f | %0.2f | %0.2f\n";
			$tmp .= "y | %0.2f | %0.2f | %0.2f | %0.2f\n";
			$tmp .= "z | %0.2f | %0.2f | %0.2f | %0.2f\n";
			$tmp .= "w | %0.2f | %0.2f | %0.2f | %0.2f";
			return (vsprintf($tmp, array($this->matrix[0], $this->matrix[1], $this->matrix[2], $this->matrix[3], $this->matrix[4], $this->matrix[5], $this->matrix[6], $this->matrix[7], $this->matrix[8], $this->matrix[9], $this->matrix[10], $this->matrix[11], $this->matrix[12], $this->matrix[13], $this->matrix[14], $this->matrix[15])));
		}
		private function go() {
			switch ($this->_preset) {
				case (self::IDENTITY) :
					$this->identity(1);
					break;
				case (self::TRANSLATION) :
					$this->trans();
					break;
				case (self::SCALE) :
					$this->identity($this->_scale);
					break;
				case (self::RX) :
					$this->rx();
					break;
				case (self::RY) :
					$this->ry();
					break;
				case (self::RZ) :
					$this->rz();
					break;
				case (self::PROJECTION) :
					$this->projection();
					break;
			}
		}
		private function identity($scale) {
			$this->matrix[0] = $scale;
			$this->matrix[5] = $scale;
			$this->matrix[10] = $scale;
			$this->matrix[15] = 1;
		}
		private function trans() {
			$this->identity(1);
			$this->matrix[0] = 1;
			$this->matrix[5] = 1;
			$this->matrix[10] = 1;
			$this->matrix[15] = 1;
			$this->matrix[3] = $this->_vtc->getX();
			$this->matrix[7] = $this->_vtc->getY();
			$this->matrix[11] = $this->_vtc->getZ();
		}
		private function rx() {
			$this->identity(1);
			$this->matrix[0] = 1;
			$this->matrix[5] = cos($this->_angle);
			$this->matrix[6] = -sin($this->_angle);
			$this->matrix[9] = sin($this->_angle);
			$this->matrix[10] = cos($this->_angle);
		}
		private function ry() {
			$this->identity(1);
			$this->matrix[0] = cos($this->_angle);
			$this->matrix[2] = sin($this->_angle);
			$this->matrix[5] = 1;
			$this->matrix[8] = -sin($this->_angle);
			$this->matrix[10] = cos($this->_angle);
		}
		private function rz() {
			$this->identity(1);
			$this->matrix[0] = cos($this->_angle);
			$this->matrix[4] = sin($this->_angle);
			$this->matrix[5] = 1;
			$this->matrix[10] = cos($this->_angle);
			$this->matrix[15] = cos($this->_angle);
		}
		private function projection() {
			$this->identity(1);
			$this->matrix[5] = 1 / tan(0.5 * deg2rad($this->_fov));
			$this->matrix[0] = $this->matrix[5] / $this->_ratio;
			$this->matrix[10] = -1 * (-$this->_near - $this->_far) / ($this->_near - $this->_far);
			$this->matrix[11] = (2 * $this->_near * $this->_far) / ($this->_near - $this->_far);
			$this->matrix[14] = -1;
            $this->matrix[15] = 0;
        }
		public function mult(Matrix $rhs) {
			$tmp = array();
			for ($i = 0; $i < 16; $i += 4) {
				for ($j = 0; $j < 4; $j++) {
					$tmp[$i + $j] = 0;
					$tmp[$i + $j] += $this->matrix[$i + 0] * $rhs->matrix[$j + 0];
					$tmp[$i + $j] += $this->matrix[$i + 1] * $rhs->matrix[$j + 4];
					$tmp[$i + $j] += $this->matrix[$i + 2] * $rhs->matrix[$j + 8];
					$tmp[$i + $j] += $this->matrix[$i + 3] * $rhs->matrix[$j + 12];
				}
			}
			$matr = new Matrix();
			$matr->matrix = $tmp;
			return $matr;
		}
		public function transpon(Matrix $mat) {
			$tmp = array();
			$tmp[0] = $mat->matrix[0];
			$tmp[1] = $mat->matrix[4];
			$tmp[2] = $mat->matrix[8];
			$tmp[3] = $mat->matrix[12];
			$tmp[4] = $mat->matrix[1];
			$tmp[5] = $mat->matrix[5];
			$tmp[6] = $mat->matrix[9];
			$tmp[7] = $mat->matrix[13];
			$tmp[8] = $mat->matrix[2];
			$tmp[9] = $mat->matrix[6];
			$tmp[10] = $mat->matrix[10];
			$tmp[11] = $mat->matrix[14];
			$tmp[12] = $mat->matrix[3];
			$tmp[13] = $mat->matrix[7];
			$tmp[14] = $mat->matrix[11];
			$tmp[15] = $mat->matrix[15];
			$mat->matrix = $tmp;
			return ($mat);
		}
		public function transformVertex(Vertex $vtx) {
			$tmp = array();
			$tmp['x'] = ($vtx->getX() * $this->matrix[0]) + ($vtx->getY() * $this->matrix[1]) + ($vtx->getZ() * $this->matrix[2]) + ($vtx->getW() * $this->matrix[3]);
			$tmp['y'] = ($vtx->getX() * $this->matrix[4]) + ($vtx->getY() * $this->matrix[5]) + ($vtx->getZ() * $this->matrix[6]) + ($vtx->getW() * $this->matrix[7]);
			$tmp['z'] = ($vtx->getX() * $this->matrix[8]) + ($vtx->getY() * $this->matrix[9]) + ($vtx->getZ() * $this->matrix[10]) + ($vtx->getW() * $this->matrix[11]);
			$tmp['w'] = ($vtx->getX() * $this->matrix[11]) + ($vtx->getY() * $this->matrix[13]) + ($vtx->getZ() * $this->matrix[14]) + ($vtx->getW() * $this->matrix[15]);
			$tmp['color'] = $vtx->getColor();
			$vertex = new Vertex($tmp);
			return $vertex;
		}
	}
?>
