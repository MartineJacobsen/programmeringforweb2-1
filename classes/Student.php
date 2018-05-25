<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Student {

        private $student_nr, $name, $surname, $birthdate, $courses_completed, $courses_failed, $grades = [];

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

            $courses_completed = 0;

            foreach($this->grades as $grade) {

                if ($grade->getGrade() > 0) {
                    $courses_completed++;
                }
            }

            return $courses_completed;

        }

        // method for getting courses completed
        public function getCoursesFailed() {
            $courses_failed = 0;

            foreach($this->grades as $grade) {

                if ($grade->getGrade() == 0) {
                    $courses_failed++;
                }
            }

            return $courses_failed;
        }

        // method for register grades for student
        public function registerGrades($grade) {
            $this->grades[] = $grade;
        }

        // method for getting registered grades for student
        public function getGrades() {
            return $this->grades;
        }

        // method for calculating each student's GPA
        public function getGPA() {

            $tot_gradepoints    = 0;
            $total_credits      = 0;

            foreach ($this->grades as $grade) {
                $credit = $grade->getCourse()->getNumberofCredits();
                $gradepoints = $grade->getGrade() * $credit;
                $tot_gradepoints += $gradepoints;
                $total_credits += $credit;
            }

            $gpa = $tot_gradepoints / $total_credits;
            return round($gpa, 2);

        }

    }

?>
