<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Course.php';


$db = new Database();

$course = new Course($db);

// If there is an id-parameter with a value...
if(isset($_GET['id'])) {
  $courseId = $_GET['id'];

  // Get the info for that particular course
  $result = $course->getSingleCourse($courseId);

  http_response_code(200);
  echo json_encode($result->fetch());
} else {
  // If there is not an id-parameter with value
  $result = $course->getCourses();

  if ($result->rowCount() > 0) {
    http_response_code(200);
    echo json_encode($result->fetchAll());
  } else {
    http_response_code(404);
    echo json_encode(['message' => 'There are no courses']);
  }
} 