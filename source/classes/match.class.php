<?php

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
    // ID: 1 = Liga, 2 = Pokal, 3 = International; 4 = Freundschaftsspiel
    private $comp;
    
    public function __construct( $_id, $_home = 0, $_away = 0, $_venue = 0, $_comp = 0 ) {
		if ( $_id ) {
			// Daten aus MySQL-DB holen
		}
		else {
			$this->id = 0;
			$this->home = $_home;
			$this->away = $_away;
			$this->venue = $_venue;
			$this->comp = $_comp;
		}
    }
    
    public function get_id() {
        return $this->id;
    }
	
    public function set_id($id) {
        $this->id = $id;
    }

    public function get_home() {
        return $this->home;
    }

    public function set_home($home) {
        $this->home = $home;
    }

    public function get_away() {
        return $this->away;
    }

    public function set_away($away) {
        $this->away = $away;
    }

    public function get_home_score() {
        return $this->home_score;
    }

    public function set_home_score($home_score) {
        $this->home_score = $home_score;
    }

    public function get_away_score() {
        return $this->away_score;
    }

    public function set_away_score($away_score) {
        $this->away_score = $away_score;
    }

    public function get_venue() {
        return $this->venue;
    }

    public function set_venue($venue) {
        $this->venue = $venue;
    }

    public function get_comp() {
        return $this->comp;
    }

    public function set_comp($comp) {
        $this->comp = $comp;
    }

	public function get_home_expected() {
		return $this->home_expected;
	}

	public function set_home_expected($home_expected) {
		$this->home_expected = $home_expected;
	}

	public function get_away_expected() {
		return $this->away_expected;
	}

	public function set_away_expected($away_expected) {
		$this->away_expected = $away_expected;
	}    
}

?>
