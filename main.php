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

        foreach ($students as $key => $student) {

            // assign first value of array as key (Student Number)
            $this->students[$student[0]] = new Student($student[0],$student[1],$student[2],$student[3],$student[4],$student[5]);

        }

        // Read CSV and make array
        $courses = array_map('str_getcsv', file('csv/courses.csv'));
        array_shift($courses);

        foreach ($courses as $key => $course) {

            // assign first value of array as key (Course Code)
            $this->courses[$course[0]] = new Course($course[0],$course[1],$course[2],$course[3],$course[4],$course[5]);

        }

        // Read CSV and make array
        $grades = array_map('str_getcsv', file('csv/grades.csv'));
        array_shift($grades);

        foreach ($grades as $key => $grade) {

            // no unique value to use as key
            $this->grades[$key] = new Grade($grade[0],$grade[1],$grade[2]);

            // assign grades to correct student with identifying value (Student Number) from grades
            $this->students[$grade[0]]->registerGrades($this->grades[$key]);

            // set which course grade is registered for with identifying value (Course Code) from grades
            $this->grades[$key]->setCourse($this->courses[$grade[1]]);

        }

        // Read CSV and make array
        $instructors = array_map('str_getcsv', file('csv/instructors.csv'));
        array_shift($instructors);

        foreach ($instructors as $key => $instructor) {

            // no unique value to use as key
            $this->instructors[$key] = new Instructor($instructor[0],$instructor[1]);

            $this->instructors[$key]->assignCourse($this->courses[$instructor[0]]);

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
