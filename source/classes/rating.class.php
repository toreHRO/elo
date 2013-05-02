<?php

/**
 * Description of rating
 *
 * @author Tore
 */
class rating {
	
	private $id;
	private $points;
	private $date;
	
	public function __construct( $_id, $_points = 0 ) {
//		if ( $_id ) {
//			// aus DB
//		}
//		else {
			$this->id = 0;
			$this->points = $_points;
//		}
	}
	
	public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_points() {
		return $this->points;
	}

	public function set_points($points) {
		$this->points = $points;
	}

	public function get_date() {
		return $this->date;
	}

	public function set_date($date) {
		$this->date = $date;
	}
	
	public function write_ratings_in_db() {
		// Variablen in DB schreiben
	}
	
}

?>
