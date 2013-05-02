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
    // Objekt der Klasse Team
    private $home;
    // Objekt der Klasse Team
    private $away;
    private $home_score;
    private $away_score;
	private $home_expected;
	private $away_expected;
    // ID: 0 = neutraler Platz, 1 = kein neutraler platz
    private $venue;
    // ID: 0 = Liga, 1 = Pokal, 2 = International; 3 = Freundschaftsspiel
    private $comp;
    
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

    public function get_home_score() {
        return $this->home_score;
    }

    public function set_home_score( $home_score ) {
        $this->home_score = $home_score;
    }

    public function get_away_score() {
        return $this->away_score;
    }

    public function set_away_score( $away_score ) {
        $this->away_score = $away_score;
    }

    public function get_venue() {
        return $this->venue;
    }

    public function set_venue( $venue ) {
        $this->venue = $venue;
    }

    public function get_comp() {
        return $this->comp;
    }

    public function set_comp( $comp ) {
        $this->comp = $comp;
    }

	public function get_home_expected() {
		if ( !$this->home_expected ) {
			$expected_scores = calculate_expected_score( $this->home, $this->away );
			$this->home_expected = $expected_scores[ "home" ];
			$this->away_expected = $expected_scores[ "away" ];
		}
		return $this->home_expected;
	}

	public function set_home_expected($home_expected) {
		$this->home_expected = $home_expected;
	}

	public function get_away_expected() {
		if ( !$this->away_expected ) {
			$expected_scores = calculate_expected_score( $this->home, $this->away );
			$this->home_expected = $expected_scores[ "home" ];
			$this->away_expected = $expected_scores[ "away" ];
		}
		return $this->away_expected;
	}

	public function set_away_expected($away_expected) {
		$this->away_expected = $away_expected;
	}   
	
	public function save_new_ratings() {
		$changes = calculate_rating_changes( $this );
		$home_new = $this->home->get_rating + $changes[ "home" ];
		$away_new = $this->away->get_rating + $changes[ "away" ];
		
		$this->home->set_rating( $home_new );
		$this->away->set_rating( $away_new );
		
		// In DB schreiben
	}
}

?>
