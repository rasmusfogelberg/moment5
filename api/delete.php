<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Course.php';

// Instatiate connection to database
$db = new Database();
// Pass instance to entity class
$course = new Course($db);

// If we have an id-parameter with a value...
if(isset($_GET['id'])) {
  $courseId = $_GET['id'];

  // Get the info for that particular course
  $result = $course->deleteCourse($courseId);

/*   http_response_code(200);
  echo json_encode($result->fetch()); */
} 