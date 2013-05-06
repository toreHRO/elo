<?php
require_once 'calculations.php';
require_once 'classes/team.class.php';

/**
 * Description of match
 *
 * @author Tore
 */
class match {
    
    private $id;
	/**
	 * Heimteam
	 * @var team 
	 */
    private $home;
	/**
	 * Auswärtsteam
	 * @var team 
	 */
    private $away;
	/**
	 * Ergebnis des Matches für das Heimteam (Anzahl der Tore/Punkte)
	 * @var int
	 */
    private $home_score;
	/**
	 * Ergebnis des Matches für das Auswärtsteam (Anzahl der Tore/Punkte)
	 * @var int
	 */
    private $away_score;
	/**
	 * Ausgang des Matches für das Heimteam
	 * @var float 0 für Niederlage; 0,5 für Unentschieden; 1 für Sieg
	 */
    private $home_result;
	/**
	 * Ausgang des Matches für das Auswärtsteam
	 * @var float 0 für Niederlage; 0,5 für Unentschieden; 1 für Sieg
	 */
    private $away_result;
	/**
	 * erwarteter Ausgang für das Heimteam als Prozentangabe
	 * @var float zwischen 0 und 1
	 */
	private $home_expected;
	/**
	 * erwarteter Ausgang für das Auswärtsteam als Prozentangabe
	 * @var float zwischen 0 und 1
	 */
	private $away_expected;
	/**
	 * zeigt an, ob das Spiel auf neutralem Platz ausgetragen wird oder nicht
	 * sollte in Bewertung einfließen --> Heimvorteil oder nicht
	 * @var int 0 = neutraler Platz; 1 = kein neutraler Platz
	 */
    private $venue;
	/**
	 * Art des Wettbewerbs (competition)
	 * ??? umrechnen in Bewertungsfaktore: 20, 30 ...
	 * @var int 0 = Liga; 1 = Pokal; 2 = International; 3 = Freundschaftspiel
	 */
    private $comp;
	/**
	 * Datum des Matches
	 * @var date 
	 */
	private $date;
	/**
	 * absoluter Betrag der Tor-/Punktedifferenz des Matches
	 * @var int 
	 */
	private $diff;
	/**
	 * Faktor aus der Tor-/Puktedifferenz; wichtig für Berechnung
	 * @var float 
	 */
	private $diff_factor;
    
    public function __construct( $_id, team $_home, team $_away, $_venue = 0, $_comp = 0 ) {
//		if ( $_id ) {
//			// Daten aus MySQL-DB holen
//		}
//		else {
			$this->id = 0;
			$this->home = $_home;
			$this->away = $_away;
			$this->venue = $_venue;
			$this->comp = $_comp;
//		}
    }
    
    public function get_id() {
        return $this->id;
    }
	
    public function set_id( $id ) {
        $this->id = $id;
    }

    public function get_home() {
        return $this->home;
    }

    public function set_home( $home ) {
        $this->home = $home;
    }

    public function get_away() {
        return $this->away;
    }

    public function set_away( $away ) {
        $this->away = $away;
    }

	/**
	 * gibt das Ergebnis des Heimteams zurück
	 * @return int Anzahl der Tore/Punkte
	 */
    public function get_home_score() {
        return $this->home_score;
    }

	/**
	 * @param int $_home_score Anzahl der Tore/Punkte
	 */
    public function set_home_score( $_home_score ) {
        $this->home_score = $_home_score;
    }

	/**
	 * gibt das Ergebnis des Auswärtsteams zurück
	 * @return int Anzahl der Tore/Punkte
	 */
    public function get_away_score() {
        return $this->away_score;
    }

	/**
	 * @param int $_away_score Anzahl der Tore/Punkte
	 */
    public function set_away_score( $_away_score ) {
        $this->away_score = $_away_score;
    }
	
	/**
	 * setzt die Scores für das Heim- und Auswärtsteam
	 * @param int $_home_score Tore/Punkte des Heimteams
	 * @param int $_away_score Tore/Punkte des Auswärtsteams
	 * @return boolean 
	 */
	public function set_scores( $_home_score, $_away_score ) {
		$this->home_score = $_home_score;
		$this->away_score = $_away_score;
		
		if ( $this->home_score == $this->away_score ) {
			$this->home_result = 0.5;
			$this->away_result = 0.5;
			return 1;
		}
		elseif ( $this->home_score > $this->away_score ) {
			$this->home_result = 1;
			$this->away_result = 0;
			return 1;
		}
		else {
			$this->home_result = 0;
			$this->away_result = 1;
			return 1;
		}
		
		return 0;
	}

	public function get_venue() {
        return $this->venue;
    }

    public function set_venue( $_venue ) {
        $this->venue = $_venue;
    }

    public function get_comp() {
        return $this->comp;
    }

    public function set_comp( $_comp ) {
        $this->comp = $_comp;
    }
	
	public function get_date() {
		return $this->date;
	}

	public function set_date( $_date ) {
		$this->date = $_date;
	}
	
	public function get_diff() {
		$this->diff = abs( $this->home_score - $this->away_score );
		return $this->diff;
	}

	public function set_diff( $_diff ) {
		$this->diff = $_diff;
	}

	public function get_diff_factor() {
		$difference = $this->get_diff(); 
		if ( $difference == 0 || $difference == 1 ) {
			$this->diff_factor = 1;
		}
		elseif ( $difference == 2 ) {
			$this->diff_factor = 1.5;
		}
		else {
			$this->diff_factor = ( 11 + $difference )/8;
		}
		return $this->diff_factor;
	}

	public function set_diff_factor( $_diff_factor ) {
		$this->diff_factor = $_diff_factor;
	}
		
	/**
	 * gibt den Ausgang für das Heimteam zurück
	 * @return float 0 = Niederlage; 0,5 = Unentschieden; 1 = Sieg
	 */
	public function get_home_result() {
		return $this->home_result;
	}

	/**
	 * setzt den Spielausgang für das Heimteam
	 * setzt gleichzeitig den entsprechenden Ausgang für das Auswärtsteam
	 * @param float $_home_result 0 = Niederlage; 0,5 = Unentschieden; 1 = Sieg
	 * @return boolean 0 = fehler; 1 = okay
	 */
	public function set_home_result( $_home_result ) {
		if ( $_home_result == 0 ) {
			$this->home_result = 0;
			$this->away_result = 1;
			return 1;
		}
		elseif ( $_home_result == 0.5 ) {
			$this->home_result = 0.5;
			$this->away_result = 0.5;
			return 1;
		}
		elseif ( $_home_result == 1 ) {
			$this->home_result = 1;
			$this->away_result = 0;
			return 1;
		}
		else
			return 0;
	}

	/**
	 * gibt den Ausgang für das Auswärtsteam zurück
	 * @return float 0 = Niederlage; 0,5 = Unentschieden; 1 = Sieg
	 */
	public function get_away_result() {
		return $this->away_result;
	}

	/**
	 * setzt den Spielausgang für das Auswärtsteam
	 * setzt gleichzeitig den entsprechenden Ausgang für das Heimteam
	 * @param float $_away_result 0 = Niederlage; 0,5 = Unentschieden; 1 = Sieg
	 * @return boolean 0 = fehler; 1 = okay
	 */
	public function set_away_result( $_away_result ) {
		if ( $_away_result == 0 ) {
			$this->away_result = 0;
			$this->home_result = 1;
			return 1;
		}
		elseif ( $_away_result == 0.5 ) {
			$this->away_result = 0.5;
			$this->home_result = 0.5;
			return 1;
		}
		elseif ( $_away_result == 1 ) {
			$this->away_result = 1;
			$this->home_result = 0;
			return 1;
		}
		else
			return 0;
	}

	/**
	 * gibt den erwarteten Ausgang für das Heimteam zurück
	 * berechnet den Wert und den entsprechenden Wert für den Gegner, wenn noch nicht gesetzt
	 * kann als Siegwahrscheinlichkeit angesehen werden
	 * @return float Wert zwischen 0 und 1
	 */
	public function get_home_expected() {
		if ( !$this->home_expected ) {
			$expected_scores = calculate_expected_score( $this->home, $this->away, $this->venue );
			$this->home_expected = $expected_scores[ "home" ];
			$this->away_expected = $expected_scores[ "away" ];
		}
		return $this->home_expected;
	}

	public function set_home_expected($home_expected) {
		$this->home_expected = $home_expected;
	}

	/**
	 * gibt den erwarteten Ausgang für das Auswärtsteam zurück
	 * berechnet den Wert und den entsprechenden Wert für den Gegner, wenn noch nicht gesetzt
	 * kann als Siegwahrscheinlichkeit angesehen werden
	 * @return float Wert zwischen 0 und 1
	 */
	public function get_away_expected() {
		if ( !$this->away_expected ) {
			$expected_scores = calculate_expected_score( $this->home, $this->away, $this->venue );
			$this->home_expected = $expected_scores[ "home" ];
			$this->away_expected = $expected_scores[ "away" ];
		}
		return $this->away_expected;
	}

	public function set_away_expected($away_expected) {
		$this->away_expected = $away_expected;
	}   
	
	/**
	 * berechnet die neuen Ratings anhand des gespiecherten Ausgangs und des Ergebnisses
	 * speichert die neuen Ratings in der Datenbank
	 * @return boolean 
	 */
	public function set_new_ratings() {
		$changes = calculate_rating_changes( $this );
		$home_new = $this->home->get_rating_points() + $changes[ "home" ];
		$away_new = $this->away->get_rating_points() + $changes[ "away" ];
		
		$this->home->set_rating_points( $home_new );
		$this->away->set_rating_points( $away_new );
		
		// In DB schreiben
		return 1;
	}
}

?>
