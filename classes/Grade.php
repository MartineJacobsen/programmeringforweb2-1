<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Grade {

        private $studentno, $courseno, $grade;

        public function __construct($studentno, $courseno, $grade) {

            $this->studentno = $studentno;
            $this->courseno  = $courseno;
            $this->grade     = $grade;

        }

        // method for getting student number from grade
        public function getStudentNo() {
            return $this->studentno;
        }

        // method for getting student number from grade
        public function getCourseNo() {
            return $this->courseno;
        }

        // method for getting grade
        public function getGrade() {
            return $this->grade;
        }

    }

?>
