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

        // method for getting course number from which course grade is given
        public function getCourseNo() {
            return $this->courseno;
        }

        // method for getting grade given
        public function getGrade() {
            return $this->grade;
        }

        // returning letter grade to numeric grade (used for calculating i.e. GPA)
        public function getNumGrade() {
            return 102 - ord(strtolower($this->grade));

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
            $gradepoints = $this->getNumGrade() * $credit;

            return $gradepoints;

        }

    }

?>
