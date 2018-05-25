<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Course {

        private $course_code, $course_name, $year, $semester, $instructor_name, $no_credits;

        function __construct($course_code, $course_name, $year, $semester, $instructor_name, $no_credits) {

            $this->course_code     = $course_code;
            $this->course_name     = $course_name;
            $this->year            = $year;
            $this->semester        = $semester;
            $this->instructor_name = $instructor_name;
            $this->no_credits      = intval($no_credits);

        }

        // method for getting student number
        public function getCourseCode() {
            return $this->course_code;
        }

        // method for getting name
        public function getCourseName() {
            return $this->course_name;
        }

        // method for getting surname
        public function getYear() {
            return $this->year;
        }

        // method for getting birthdate
        public function getSemester() {
            return $this->semester;
        }

        // method for getting courses completed
        public function getInstructorName() {
            return $this->instructor_name;
        }

        // method for getting courses completed
        public function getNumberofCredits() {
            return $this->no_credits;
        }

    }

?>
