<?php 
require_once 'airport.php';

$response = '';
$debugState = true;

$request = $_SERVER['REQUEST_URI']; 

$response['debug']['file'] = __FILE__;
$response['debug']['request'] = $request;
$response['code'] = 200;

$requestElems = explode ("?",$request);
$response['debug']['requestElems'] = $requestElems;
if (!empty($requestElems[0])) {
	$urlElems = explode ("/", $requestElems[0]);
	$response['debug']['urlElems'] = $urlElems;
	if (!empty($urlElems)) {
		// the leading slash in the URL make the [0] element empty
		//   so the first element with something in it is [1]
		if (!empty($urlElems[1])) {
			if ($urlElems[1] == "api") {
				// this is a correctly formatted URL
				if (!empty($urlElems[1])) {
					// process the query parameters, if any
					if (!empty($requestElems[1])) {
						$qpElems = explode ("&",$requestElems[1]);
						if (empty($qpElems)){
							$qpElems = NULL;
						}
					} else 	{
						$qpElems = NULL;
					}
					// collect any remaining URL elements
					$resourceElems = [];
					for ($elemIdx = 3; $elemIdx < count($urlElems); $elemIdx++) {
						array_push($resourceElems, $urlElems[$elemIdx]);
					}
					$response['debug']['resourceElems'] = $resourceElems;
					$response['debug']['qpElems'] = $qpElems;
					// select the method for the resource
					switch ($urlElems[2]) {
						case 'airport':
							$response = _doAirport($resourceElems, $qpElems);
							break;
							
						default:
							$response['code'] = 400;
							$response['error']['message'] = 'Unsupported resource resource type.';		
							break;
					}
				}		
			} else {
				$response['code'] = 400;
				$response['error']['message'] = 'Unsupported resource specification.';		
			}
		} else {
			$response['code'] = 400;
			$response['error']['message'] = 'Unsupported resource specification.';		
		}
	} else {
		$response['code'] = 400;
		$response['error']['message'] = 'Unsupported resource specification.';		
	}
} 
else {
	$response['code'] = 400;
	$response['error']['message'] = 'Unsupported resource specification.';
}

require 'format_response.php';
print $fnResponse;
?>