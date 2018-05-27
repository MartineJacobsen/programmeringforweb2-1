<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Instructor {

        private $courseCode, $instructorName, $courses = [];

        function __construct($courseCode, $instructorName) {

            $this->courseCode     = $courseCode;
            $this->instructorName = $instructorName;

        }

        // method for getting student number
        public function get_CourseCode() {
            return $this->courseCode;
        }

        // method for getting name
        public function get_InstructorName() {
            return $this->instructorName;
        }

        // method for assigning courses to instructor
        public function setCourses($courses) {
            $this->courses[] = $courses;
        }

        // method for getting courses assigned to instructor
        public function get_Courses() {
            return $this->courses;
        }

    }

?>
