<?php

function _airport_get_airport ($link, $requestBuffer, $debugState) {
require_once 'dbConfig.php';
require_once 'db_utils.php';
	// initialize the response buffer
	// $requestBuffer is the AIRPORT ID to look up and return
	$response = '';
	// initialize the debug values
	if ($debugState) {
		$response['debug']['module'] = __FILE__;
		$response['debug']['requestBuffer'] = $requestBuffer;
		$response['debug']['link'] = $link;
	}
	if (!is_null($link)) {
		if (empty($response['error'])) {
			// validate the request buffer fields
			if (!empty($requestBuffer)) {
				$localErr = '';
				$airportId = $requestBuffer;
				// 
				if (!empty($airportId)) { 
					$response['error'] = $localErr;
				}
				
				// if there was an error, return it, otherwise add the record
				if (!empty($localErr)) {
					if (empty($response['error'])) {
						$errData = get_error_message ($link, 400);
						$errData['requestError'] = $localErr;
						$response['error'] = $errData;
					}
				} else {
					// read conifguration for this study and condition
					$queryString = 'SELECT * FROM '.DB_TABLE_AIRPORTS.
						' WHERE ident = "'.$airportId.'"';
					$result = @mysqli_query ($link, $queryString);
					$idx = 0;
					if ($result) {
						if (mysqli_num_rows($result)  > 0) {
							while ($thisRecord = mysqli_fetch_assoc($result))  {
								$response['data'][$idx] = array_merge($thisRecord);
								foreach ($response['data'][$idx] as $k => $v) {
									// set "null" strings to null values
									if ($v == 'NULL') {
										$response['data'][$k] = NULL;
									}
								}
								$idx += 1;
							}
						}						
					}
					if ($idx == 0) {
						$localErr = '';
						$localErr['info'] = 'No airport records found for the specified ID';
						$localErr = get_error_message ($link, 404);
						$response['error'] = $localErr;
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
			} else {
				$errData = get_error_message ($link, 400);
				$errData['info'] = 'No data in request.';
				$response['error'] = $errData;
			}
		}
	}			
	// not implemented
	$errData['code'] = 501;
	$errData['message'] = 'Not implemented';
	$response['error'] = $errData;
	return $response;
}
?>