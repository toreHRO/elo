<?php

/**
 * Description of rating
 *
 * Rating-Klasse für bessere Datenbankanbindung
 * Ratings sollen in der DB mit Datum gespeichert werden, so dass eine historische Betrachtung
 * der Ratings, bzw. des Ratingverlaufs möglcih ist
 * 
 * @author Tore
 */
class rating {
	
	private $id;
	private $points;
	/**
	 * Datum des Tages, an dem das Rating "gültig" war
	 * @var date 
	 */
	private $date;
	/**
	 * Datum des Eintrags in die Datenbank
	 * @var date 
	 */
	private $entry_date;
	/**
	 * ID des Teams, für das das Rating gilt
	 * @var int 
	 */
	private $team_id;
	// TODO: Datum-Typ
	
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

	public function set_id( $_id ) {
		$this->id = $_id;
	}

	public function get_points() {
		return $this->points;
	}

	public function set_points( $_points ) {
		$this->points = $_points;
	}

	public function get_date() {
		return $this->date;
	}

	public function set_date( $_date ) {
		$this->date = $_date;
	}
	
	public function get_entry_date() {
		return $this->entry_date;
	}

	public function set_entry_date( $_entry_date ) {
		$this->entry_date = $_entry_date;
	}

	public function get_team_id() {
		return $this->team_id;
	}

	public function set_team_id( $_team_id ) {
		$this->team_id = $_team_id;
	}
	
	/**
	 * schreibt das Rating in die Rating-Tabelle der Datenbank
	 * @return boolean 
	 */
	public function write_ratings_in_db() {
		// Variablen in DB schreiben
		return 0;
	}
	
}

?>
