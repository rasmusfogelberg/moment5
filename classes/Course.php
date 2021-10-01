<?php

class Course
{
    private $db;

    public $id;
    public $code;
    public $name;
    public $progression;
    public $course_syllabus;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Get all courses
     *
     */
    public function getCourses()
    {
        $query = "SELECT * FROM course";

        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement;
    }

    public function getSingleCourse(int $courseId)
    {
        $courseId = intval($courseId);
        // :courseId = placeholder value for the prepared statement
        $query = "SELECT * FROM course WHERE id = :courseId";

        $statement = $this->db->prepare($query);

        // execute method takes an array as parameter with the placeholder values in order
        $statement->execute(array('courseId' => $courseId));
        return $statement;
    }

    public function deleteCourse(int $courseId)
    {
        $courseId = intval($courseId);
      
        $query = "DELETE FROM course WHERE id = :courseId";

        $statement = $this->db->prepare($query);
        $statement->execute(array('courseId' => $courseId));

        return $statement;
    }

    public function createCourse(string $code, string $name, string $progression, string $course_syllabus)
    {
        $query = "INSERT INTO course (code, name, progression, course_syllabus)
                VALUES (
                  :code,
                  :name,
                  :progression,
                  :course_syllabus
                );";
      
        $statement = $this->db->prepare($query);
        $statement->execute(array('code' => $code, 'name' => $name, 'progression' => $progression, 'course_syllabus' => $course_syllabus));

        return $statement;
    }
}
