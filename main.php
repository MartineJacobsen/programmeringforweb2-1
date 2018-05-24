<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

// require Class files
require_once ('classes/Student.php');
require_once ('classes/Course.php');
require_once ('classes/Grade.php');
require_once ('classes/Instructor.php');

class Main {

    public $students = [], $courses = [], $grades = [];

    function __construct() {

        $this->run_file();

    }

    public function getStudents() {

        return $this->students;

    }

    public function getCourses() {

        return $this->courses;

    }

    public function getGrades() {

        return $this->grades;

    }

    public function getInstructors() {

        return $this->instructors;

    }

    function run_file() {

        // Read CSV and make array
        $students = array_map('str_getcsv', file('csv/students.csv'));
        array_shift($students);

        foreach ($students as $student) {
            $this->students[] = new Student($student[0],$student[1],$student[2],$student[3],$student[4],$student[5]);
        }

        $courses = array_map('str_getcsv', file('csv/courses.csv'));
        array_shift($courses);

        foreach ($courses as $course) {
            $this->courses[] = new Course($course[0],$course[1],$course[2],$course[3],$course[4],$course[5]);
        }

        $grades = array_map('str_getcsv', file('csv/grades.csv'));
        array_shift($grades);

        foreach ($grades as $grade) {
            $this->grades[] = new Grade($grade[0],$grade[1],$grade[2]);
        }

        $instructors = array_map('str_getcsv', file('csv/instructors.csv'));
        array_shift($instructors);

        foreach ($instructors as $instructor) {
            $this->instructors[] = new Instructor($instructor[0],$instructor[1]);
        }

    }

}

$main = new Main();

// declare variables for getting objects
$Students = $main->getStudents();
$Courses = $main->getCourses();
$Grades = $main->getGrades();
$Instructors = $main->getInstructors();

?>
