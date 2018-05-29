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

    public $students = [], $courses = [], $grades = [], $instructors = [];

    function __construct() {

        $this->run_file();

    }

    // get Student objects
    public function getStudents() {

        return $this->students;

    }

    // get Course objects
    public function getCourses() {

        return $this->courses;

    }

    // get Instructor objects
    public function getInstructors() {

        return $this->instructors;

    }

    // get Grade objects
    public function getGrades() {

        return $this->grades;

    }

    function run_file() {

        // Read CSV and make array
        $students = array_map('str_getcsv', file('csv/students.csv'));
        array_shift($students);

        foreach ($students as $key => $student) {

            // assign first value of array as key (Student Number)
            $this->students[$student[0]] = new Student($student[0],$student[1],$student[2],$student[3]);

        }

        // Read CSV and make array
        $courses = array_map('str_getcsv', file('csv/courses.csv'));
        array_shift($courses);

        foreach ($courses as $key => $course) {

            // assign first value of array as key (Course Code)
            $this->courses[$course[0]] = new Course($course[0],$course[1],$course[2],$course[3],$course[4]);

        }

        // Read CSV and make array
        $grades = array_map('str_getcsv', file('csv/grades.csv'));
        array_shift($grades);

        foreach ($grades as $key => $grade) {

            // no unique value to use as key
            $this->grades[$key] = new Grade($grade[0],$grade[1],$grade[2]);

            // assign grades to correct student with identifying value (Student Number) from grades
            $this->students[$grade[0]]->setGrades($this->grades[$key]);

            // set which course grade is registered for with identifying value (Course Code) from grades
            $this->grades[$key]->setCourse($this->courses[$grade[1]]);

            // set grade to course
            $this->courses[$grade[1]]->setGrades($this->grades[$key]);


        }

        // Read CSV and make array
        $instructors = array_map('str_getcsv', file('csv/instructors.csv'));
        array_shift($instructors);

        foreach ($instructors as $key => $instructor) {

            $test = array_keys($this->instructors);

            // add new instructor if instructor name doesn't exist
            if (!in_array($instructor[1], $test)) {

                // set instructor name as key
                $this->instructors[$instructor[1]] = new Instructor($instructor[0],$instructor[1]);
            }

            // assign courses to instructor
            $this->instructors[$instructor[1]]->setCourses($this->courses[$instructor[0]]);

            // set instructor to course
            $this->courses[$instructor[0]]->setInstructor($this->instructors[$instructor[1]]);


        }

    }

}

$main = new Main();

// declaring variables for getting objects
$Students = $main->getStudents();
$Courses = $main->getCourses();
$Instructors = $main->getInstructors();
$Grades = $main->getGrades();

?>
