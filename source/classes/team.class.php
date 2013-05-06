<?php

/**
 * Description of team
 *
 * @author Tore
 */
class team {
    
	/**
	 * ID des Teams, auch wichtig für Datenbnk
	 * @var int 
	 */
    private $id;
	/**
	 * Name des Teams
	 * @var String
	 */
    private $name;
	/**
	 * Objekt der Klasse Rating
	 * ausgelagerte Sachen für bessere Datenbank-Anbindung
	 * @var rating 
	 */
    private $rating;
	/**
	 * Anzahl der Elo-Punkte des Teams
	 * float oder int ???
	 * @var float 
	 */
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

	public function set_id( $_id ) {
		$this->id = $_id;
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name( $_name ) {
		$this->name = $_name;
	}

	public function get_rating() {
		return $this->rating;
	}

	public function set_rating( $_rating ) {
		$this->rating = $_rating;
	}

	public function get_rating_points() {
		return $this->rating_points;
	}

	public function set_rating_points( $rating_points ) {
		$this->rating_points = $rating_points;
	}


}

?>
