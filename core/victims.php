<?php

function getAllVictims( $database )
{

	$sth = $database->prepare( 'SELECT * FROM `victims` ORDER BY `id` DESC' );
	$sth->execute();

	return $sth->fetchAll();

}

function getVictim( $database, $id )
{

	$sth = $database->prepare( 'SELECT * FROM `victims` WHERE `id` = ? LIMIT 0,1' );
	$sth->bindParam( 1, $id );
	$sth->execute();

	return $sth->fetch( PDO::FETCH_ASSOC );

}

function getVictimByIP( $database, $ipaddr ) {

	$sth = $database->prepare( 'SELECT * FROM `victims` WHERE `ip_address` = ? LIMIT 0,1' );
	$sth->bindParam( 1, $ipaddr );
	$sth->execute();

	return $sth->fetch( PDO::FETCH_ASSOC );

}

function updateVictim( $database, $id, array $fields )
{

	$parts = [];
    $params = [];

    foreach ( $fields as $field => $value ) {
        $varname = "FIELD_$field";
        $parts[] =  "$field = :$varname";
        $params[ $varname ] = $value;
    }
    
    $setPart = implode( ", ", $parts );
    $params[ 'id' ] = $id;

    try {

        $sth = $database->prepare( "UPDATE `victims` SET $setPart WHERE `id` = :id;" );
        $sth->execute( $params );

    } catch(Exception $e) {

        return $e;

    }

    return true;

}

function createVictim( $database, array $params )
{

	$fields = [];
	$values = [];

	foreach ($params as $field => $value) {

		$values[] = ':'.$field;
		$fields[] = $field;

	}

	$implodedFields = implode( ',', $fields );
	$implodedValues = implode( ',', $values );

	$params = array_filter( $params, function($param) {

		return !($param instanceof Expression);

	} );

	try {

		$sth = $database->prepare( 'INSERT INTO `victims` (' . $implodedFields . ') VALUES (' . $implodedValues . ');' );
		$sth->execute($params);

	} catch( Exception $e ) {

		return $e;

	}

	return $database->lastInsertId();

}

function deleteVictim( $database, $id )
{

	try {

		$sth = $database->prepare( 'DELETE FROM `victims` WHERE `id` = ?;' );
		$sth->bindParam( 1, $id );
		$sth->execute();

	} catch(Exception $e) {

		return $e;

	}

	return true;

}

function validUser( $database )
{

	if ( !isset( $_SESSION[ 'id' ] ) ) {

		return false;

	}

	if ( !isset( $database ) ) {

		return false;

	}

	$result = getVictim( $database, $_SESSION[ 'id' ] );

	if ( empty( $result ) ) {

		return false;

	}

	return true;

}

?>