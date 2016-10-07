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
}
?>