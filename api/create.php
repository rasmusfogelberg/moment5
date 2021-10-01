<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Typ, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Course.php';

// Instatiate connection to database
$db = new Database();
// Pass instance to entity class
$course = new Course($db);

$data = json_decode(file_get_contents('php://input'));

// Check if what has been gotten contains anything
if(isset($data->code, $data->name, $data->progression, $data->course_syllabus)) {

  // Call mehtod and provide variables
  $result = $course->createCourse($data->code, $data->name, $data->progression, $data->course_syllabus);

  if (!$result) {
    http_response_code(400);
    echo json_encode(['message' => 'Could not process request']);
  } else {
    http_response_code(200);
    echo json_encode(['message' => 'Course was created successfully. Very good job. NOW GET BACK TO WORK!']);
  }
} else {
  http_response_code(404);
  echo json_encode(['message' => 'Must fill out all fields.']);
}