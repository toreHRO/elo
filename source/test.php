<head>
	<title>Testseite</title>
</head>
<?php
require_once 'classes/team.class.php';
require_once 'classes/match.class.php';

$team_1 = new team( 1, 1500 );
$team_2 = new team( 2, 3000 );

$match = new match( 0, $team_1, $team_2 );

$score = $match->get_home_expected();
echo "$score";

//if (is_object( $match->get_home() ) )
//	echo 'ja';
//else
//	echo 'nein';
?>
