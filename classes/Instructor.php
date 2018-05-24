<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Instructor {

        private $courseCode, $instructorName;

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

    }

?>
