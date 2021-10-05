<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// This is a fix to allow preflight checks without throwing errors while maintaining CORS.
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}

include_once '../config/Database.php';
include_once '../classes/Course.php';

// Instatiate connection to database
$db = new Database();
// Pass instance to entity class
$course = new Course($db);

$data = json_decode(file_get_contents('php://input'));

if (isset($data->id)) {
    $courseId = intval($data->id);

    // Delete that particular course
    if ($course->deleteCourse($courseId)) {
        http_response_code(200);
        echo json_encode(['message' => 'Course was deleted successfully.']);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'What did you try to delete? There is nothing there.']);
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Id field is missing in request body']);
}
