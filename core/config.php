<?php

/*

	Coinbase Live v1.0
	
	READ BEFORE USE:
	 - You must enter the sql template into your database for the users to be added
	 - You must give correct permissions to the database user
	 - Dont mess with the database or it will fuck up

*/

// Database information
define( 'MYSQL_USER', 'root' ); // Database user (cPanel is {user}_{db})
define( 'MYSQL_PASS', '' ); // Your MySQL database password

define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_DATABASE', 'panelll' ); // Go into phpMyAdmin, create a table and paste the default values inside

// Admin settings
define( 'ADMIN_LOGIN', 'superhiddenpw' );

// Change this line to with password or without depending on what you have

$pdo = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE, MYSQL_USER );

/* Without password

$pdo = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE, MYSQL_USER );

*/ 

/* With password

$pdo = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DATABASE, MYSQL_USER, MYSQL_PASS );

*/

$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
$pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false ); 

?>