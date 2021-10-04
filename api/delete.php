<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../classes/Course.php';

// Instatiate connection to database
$db = new Database();
// Pass instance to entity class
$course = new Course($db);

$courseId = null;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    if (!is_numeric($_GET['id'])) {
        http_response_code(400);
        echo json_encode(['message' => 'Id parameter must be an integer']);
    } else {
        $courseId = intval($_GET['id']);

        // Delete that particular course
        if ($course->deleteCourse($courseId)) {
            http_response_code(200);
            echo json_encode(['message' => 'Course was deleted successfully.']);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'What did you try to delete? There is nothing there.']);
        }
    }
} else {
    http_response_code(404);
    echo json_encode(['message' => 'Id parameter is required']);
}
