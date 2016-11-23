<?php
if (!defined('DB_UTILS')) {
	define('DB_UTILS', '_db_utils', false);
		
	function format_object_for_SQL_insert ($tableName, $object) {
		// set the dateCreated field
		$now = new DateTime();
		$object['dateCreated'] = $now->format('Y-m-d H:i:s');
				
		// format the fields of the object to the appropriate SQL syntax		
		foreach ($object as $dbCol => $dbVal) {
			isset($dbColList) ? $dbColList .= ', ' : $dbColList = '';
			isset($dbValList) ? $dbValList .= ', ' : $dbValList = '';										
			$dbColList .= $dbCol;
			if (empty($dbVal) && (strlen($dbVal)==0)) {
				$dbValList .= 'NULL';
			} else {
				$escapedString = str_replace("'","''",$dbVal);
				$dbValList .= '\''.$escapedString.'\'';
			}							
		}
		$queryString = 'INSERT INTO '.$tableName.' ('.$dbColList.') VALUES ('.$dbValList.')';
		return $queryString;
	}
	
	function get_error_message ($link, $http_errno) {
		// $link is provided to support future message access from database;
		//  for now, the messages are hard-coded into this file.
		switch ($http_errno) {
			case 400: 
				$error_message_text = "Bad HTTP request (400).";
				break;
				
			case 404:
				$error_message_text = "Resource not found (404).";
				break;
				
			case 409:
				$error_message_text = "Duplicate resource (409).";
				break;
				
			default:
				$error_message_text = "Unrecognized error: ".$http_errno;
				break;
		}
		return $error_message_text;
	}
	
}
?>