<?php
// can't open DB so return an error
// this line only works on PHP > 5.4.0, which not everyone seems to have.
//   http_response_code(500);
// this works on PHP > 4.3 (or so)
$errData['status'] = 500;
$errData['message'] = 'Can\'t connect to database server: '.DB_SERVER;
$response['error'] = $errData;
$response['code'] = $errData['code'];
$response['debug']['module'] = __FILE__;
$response['debug']['user'] = DB_USER;
$response['debug']['database'] = DB_DATABASE_NAME;
?>