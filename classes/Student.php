<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Student {

        private $student_nr, $name, $surname, $birthdate, $courses_completed, $courses_failed;

        function __construct($student_nr, $name, $surname, $birthdate, $courses_completed, $courses_failed) {

            $this->student_nr           = $student_nr;
            $this->name                 = $name;
            $this->surname              = $surname;
            $this->birthdate            = $birthdate;
            $this->courses_completed    = $courses_completed;
            $this->courses_failed       = $courses_failed;

        }

        // method for getting student number
        public function getStudentNr() {
            return $this->student_nr;
        }

        // method for getting name
        public function getName() {
            return $this->name;
        }

        // method for getting surname
        public function getSurname() {
            return $this->surname;
        }

        // method for getting birthdate
        public function getBirthdate() {
            return $this->birthdate;
        }

        // method for getting courses completed
        public function getCoursesCompleted() {
            return $this->courses_completed;
        }

        // method for getting courses completed
        public function getCoursesFailed() {
            return $this->courses_failed;
        }

    }

?>
