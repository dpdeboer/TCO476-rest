<?php

if (!defined('REST_CONSTANTS')) {
	define('REST_CONSTANTS', 'database_constants', false);
	
	// Contains paths to files and folders shared by the 
	//  php scripts on the server.	
	// database interfaces
	define('DB_SERVER', 'localhost', false);
	define('DB_USER', 'DEFINE_FOR_YOUR_SYSTEM', false);
	define('DB_PASS', 'DEFINE_FOR_YOUR_SYSTEM', false);
	define('DB_DATABASE_NAME', 'REST_Demo', false);
	// database tables
    define('DB_TABLE_AIRPORTS', 'Airports', false);
	define('DB_TABLE_AIRLINES', 'Airlines', false);
    define('DB_TABLE_FLIGHTS', 'Flights', false);
    define('DB_TABLE_PILOTS', 'Pilots', false);	
}
?>
