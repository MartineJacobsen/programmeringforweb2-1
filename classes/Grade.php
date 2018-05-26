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
            $this->grade     = intval($grade);

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

        // method for setting course for a grade
        public function setCourse($course) {
            $this->course = $course;
        }

        // method for getting course for a grade
        public function getCourse() {
            return $this->course;
        }

        public function getGradepoints() {

            $credit = $this->getCourse()->getNumberofCredits();
            $gradepoints = $this->getGrade() * $credit;

            return $gradepoints;

        }

    }

?>
