<?php 
require_once 'dbConfig.php';
require_once 'pilot_get.php';
require_once 'pilot_post.php';
require_once 'pilot_delete.php';

$response = '';

function _doPilot($resourceElems, $qpElems, $debugState)
{
	$link = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE_NAME);
	if (!$link) {
		require 'response_500_db_open_error.php';
	} else {
		// if not HTTPS or running on a local host, return an error
		// if (!empty($_SERVER['HTTPS']) || ($_SERVER['HTTP_HOST'] == 'localhost'))
		if (true) 
		{
			if ($_SERVER['REQUEST_METHOD'] == 'GET') {
				$response = _pilot_get($link, $resourceElems, $qpElems, $debugState);
			} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// get the request data
				//  first try to decode the php://input variable 
                $postInput = file_get_contents('php://input');
				if (!empty($postInput)) {
					$postData = json_decode($postInput,true);
				}		
				// if the data is not in the raw post data, try the post form
				if (empty($postData)) {
					$postData = $_POST;
				}
				// finally, try the $_GET variable
				if (empty($postData)) {
					$postData = $_GET;
				} 
				$response = _pilot_post($link, $resourceElems, $postData, $qpElems, $debugState);
			} else if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
				$response = _pilot_delete ($link, $resourceElems, $qpElems, $debugState);

			} else {
				// method not supported
				$errData['code'] = 405;
				$errData['message'] = 'Method not supported';
				$response['error'] = $errData;
				$response['code'] = $errData['code'];
				if ($debugState) {
					$response['debug']['httpMethod'] = $_SERVER['REQUEST_METHOD'];
					$response['debug']['resourceElems'] = $resourceElems;
					$response['debug']['qpElems'] = $qpElems;
					$postData = mb_convert_encoding (file_get_contents("php://input"), "UTF-8", "auto");
					$response['debug']['postData'] = $postData;
					$response['debug']['data'] = json_decode($postData);

					$response['debug']['module'] = __FILE__;
				}				
			}
		} 
		else 
		{
				// method not supported
				$errData['code'] = 400;
				$errData['message'] = 'Only HTTPS calls are supported';
				$response['error'] = $errData;
				$response['code'] = $errData['code'];
				if ($debugState) {
					$response['debug']['module'] = __FILE__;
					$response['debug']['globals'] = $GLOBALS;
				}
		}
		mysqli_close($link);	
	}
	return $response;
}
?>