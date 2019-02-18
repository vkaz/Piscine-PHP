<?php
 Class Camera {
	public $_tT;
	public $_tR;
	public $_project;
	public $_origin;
	public $_orientation;
	public $_width;
	public $_height;
	public $_ratio;
	static $verbose = False;

		public static function doc() {
			$doc = file_get_contents('Camera.doc.txt', FILE_USE_INCLUDE_PATH);
			return $doc;
		}

		function __construct($atr) {
			$this->_origin = $atr['origin'];
			$origin = new Vector( array( 'dest' => $atr['origin']));
			$this->_orientation = $atr['orientation'];
			$this->_width = $atr['width'] / 2;
			$this->_height = $atr['height'] / 2;
			$this->_tT = new Matrix(array('preset' => Matrix::TRANSLATION, 'vtc' => $origin->opposite()));
			$this->_tR = $this->_orientation;
			$this->_ratio = $this->_width / $this->_height;
			$this->_project = new Matrix( array( 'preset' => Matrix::PROJECTION,
						'fov' => $atr['fov'],
						'ratio' => $this->_ratio,
						'near' => $atr['near'],
						'far' => $atr['far']));
			if (Self::$verbose) {
				print("Camera instance constructed".PHP_EOL);
			}
		}
		public function watchVertex(Vertex $worldVertex){
			$vect = $this->_project->transformVertex($this->_tR->transformVertex($worldVertex));
            $vect->setX($vect->getX() * $this->_ratio);
            $vect->setY($vect->getY());
            $vect->setColor($worldVertex->getColor());
            return ($vect);
		}
		function __toString() {
				if (Self::$verbose){
		            $tmp = "Camera( ".PHP_EOL;
		            $tmp .= "+ Origine: ".$this->_origin."\n";
		            $tmp .= "+ tT:\n".$this->_tT."\n";
		            $tmp .= "+ tR:\n".$this->_tR->transpon($this->_tR)."\n";
		            $tmp .= "+ tR->mult( tT ):\n".$this->_tR->mult($this->_tT)."\n";
		            $tmp .= "+ Proj:\n".$this->_project."\n)";
		            return ($tmp);
        		}
			}
	function __destruct() {
		if (Self::$verbose) {
			print( "Camera instance destructed" . PHP_EOL);}}
	}
?>
