<?php

function _airline_get_airline ($link, $airlineId, $qpElems, $debugState) {
require_once 'dbConfig.php';
require_once 'db_utils.php';
	// initialize the response buffer
	$response = '';
	// initialize the debug values
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['airlineId'] = $airlineId;
		$response['debug']['link'] = $link;
	}
	if (!is_null($link)) {
		if (empty($response['error'])) {
			// validate the request buffer fields
			if (isset($airlineId)) {
				// read conifguration for this study and condition
				$queryString = 'SELECT `AirlineId`, `AirlineName`, `OwnerName` FROM '.DB_TABLE_AIRLINES.
					' WHERE airlineId = "'.$airlineId.'"';
				$result = @mysqli_query ($link, $queryString);
				if ($result) {
					if (mysqli_num_rows($result)  > 0) {
						// take only the first record
						$thisRecord = mysqli_fetch_assoc($result);
						$response['data'] = array_merge($thisRecord);
						// correct any null values so they are converted to JSON correctly
						foreach ($response['data'] as $k => $v) {
							// set "null" strings to null values
							if ($v == 'NULL') {
								$response['data'][$k] = NULL;
							}
						}
						$response['code'] = 200;
					}						
					else 
					{
						$localErr = '';
						$localErr['info'] = 'No airline resources found for the specified ID';
						$localErr['message'] = get_error_message ($link, 404);
						$response['error'] = $localErr;
						$response['code'] = 404;
					}
				} 
				else 
				{
					$localErr = '';
					$localErr['info'] = 'No airline resources found for the specified ID';
					$localErr['message'] = get_error_message ($link, 404);
					$response['error'] = $localErr;
					$response['code'] = 404;
				}
				if ($debugState) {
					// write detailed sql info
					$localErr = '';
					$localErr['sqlQuery'] = $queryString;
					$localErr['sqlError'] =  mysqli_sqlstate($link);
					$localErr['message'] = mysqli_error($link);				
					$response['debug']['sqlSelect1']= $localErr;
				}
			}
		}
	} else {
	// not implemented
		$errData['code'] = 500;
		$errData['message'] = 'DB Error on the server.';
		$response['error'] = $errData;	
		$response['code'] = 500;
	}			
	return $response;
}
?>