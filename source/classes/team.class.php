<?php

/**
 * Description of team
 *
 * @author Tore
 */
class team {
    
    private $id;
    private $name;
    // Object of rating
    private $rating;
    private $rating_points;
    
	public function __construct( $_id, $_rating_points = 0, $_name = "" ) {
//		if ( $_id ) {
//			// aus DB holen
//		}
//		else {
			$this->id = 0;
			$this->name = $_name;
			$this->rating_points = $_rating_points;
//		}
	}
    
    public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name($name) {
		$this->name = $name;
	}

	public function get_rating() {
		return $this->rating;
	}

	public function set_rating($rating) {
		$this->rating = $rating;
	}

	public function get_rating_points() {
		return $this->rating_points;
	}

	public function set_rating_points($rating_points) {
		$this->rating_points = $rating_points;
	}


}

?>
