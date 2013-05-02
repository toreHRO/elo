<?php
require_once 'classes/team.class.php';
require_once 'classes/match.class.php';

function calculate_expected_score( team $_home, team $_away ) {
	$rating_home = $_home->get_rating_points();
	$rating_away = $_away->get_rating_points();
	
	$expected_score_home = 1 / ( 1 + ( pow( 10 , ( $rating_away - $rating_home ) / 400 ) ) );
	$expected_score_away = 1 / ( 1 + ( pow( 10 , ( $rating_home - $rating_away ) / 400 ) ) );

	return array (
		'home' => $expected_score_home,
		'away' => $expected_score_away
	);
}


function calculate_rating_changes( match $_match, $_factor = 0 ) {
	$home = $_match->get_home();
	$away = $_match->get_away();
	$score_home = $_match->get_home_score();
	$score_away = $_match->get_away_score();
	$expected_score_home = $_match->get_home_expected();
	$expected_score_away = $_match->get_away_expected();
	
	$_rating_change_home = $_factor * ( $score_home - $expected_score_home );
	$_rating_change_away = $_factor * ( $score_away - $expected_score_away );
	
	return array (
		'home' => $_rating_change_home,
		'away' => $_rating_change_away
	);
}

?>
