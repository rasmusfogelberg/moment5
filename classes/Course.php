<?php

include_once '../functions.php';

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

    /**
     * Get single courses
     *
     */

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

    /**
     * Delete a course
     */

    public function deleteCourse(int $courseId)
    {
        $courseId = intval($courseId);

        $query = "DELETE FROM course WHERE id = :courseId";

        $statement = $this->db->prepare($query);
        $statement->execute(array('courseId' => $courseId));

        return $statement;
    }

    /**
     * Create a course
     *
     */

    public function createCourse(string $code, string $name, string $progression, string $course_syllabus)
    {
        $data = func_get_args();
        $data = clean($data);

        $query = "INSERT INTO course (code, name, progression, course_syllabus)
                VALUES (
                  :code,
                  :name,
                  :progression,
                  :course_syllabus
                );";
    
        try {
            $statement = $this->db->prepare($query);
            $options = array('code' => $data[0], 'name' => $data[1], 'progression' => $data[2], 'course_syllabus' => $data[3]);

            $statement->execute($options);
            return $statement;
        } catch (PDOException $e) {
            // Should not rethrow the SQL exception, as that might show senitive info
            return false;
        }
    }

    /**
     * Update a course
     *
     */
    public function updateCourse($data)
    {
        $data = clean($data);

        $query = "UPDATE course SET 
                  code=:code, 
                  name=:name, 
                  progression=:progression, 
                  course_syllabus=:course_syllabus 
                  WHERE id = :id";

        $statement = $this->db->prepare($query);

        $statement->execute(array('code' => $data['code'], 'name' => $data['name'], 'progression' => $data['progression'], 'course_syllabus' => $data['course_syllabus'], 'id' => $data['id']));
        return $statement;
    }
}
