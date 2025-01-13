<?php

require_once( realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'functions.php' ) );

if ( validUser( $pdo ) ) {

	updateVictim( $pdo, $_SESSION[ 'id' ], [
		'heartbeat' => 8, // Seed
		'is_waiting' => 0
	] );

} else {

	header( 'location:/index.php' );

}

?>

<b>nigger</b>