<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Student {

        private $student_nr, $name, $surname, $birthdate, $grades = [];

        function __construct($student_nr, $name, $surname, $birthdate) {

            $this->student_nr           = $student_nr;
            $this->name                 = $name;
            $this->surname              = $surname;
            $this->birthdate            = date('d.m.Y', $birthdate);

        }

        // method for getting student's student number
        public function getStudentNr() {
            return $this->student_nr;
        }

        // method for getting student's name
        public function getName() {
            return $this->name;
        }

        // method for getting student's surname
        public function getSurname() {
            return $this->surname;
        }

        // method for getting student's birthdate
        public function getBirthdate() {
            return $this->birthdate;
        }

        // method for register grades for student
        public function setGrades($grades) {
            $this->grades[] = $grades;
        }

        // method for getting registered grades for student
        public function getGrades() {
            return $this->grades;
        }

        // method for getting number of courses completed
        public function getCoursesCompleted() {

            $courses_completed = 0;

            foreach($this->grades as $grade) {

                if ($grade->getNumGrade() > 0) {
                    $courses_completed++;
                }
            }

            return $courses_completed;

        }

        // method for getting number of courses failed
        public function getCoursesFailed() {
            return count($this->grades) - $this->getCoursesCompleted();
        }

        // method for calculating and returning each student's GPA
        public function getGPA() {

            $tot_gradepoints    = 0;
            $total_credits      = 0;

            // check if student has grade
            if ($this->grades != NULL ) {
                foreach ($this->grades as $grade) {
                    $credit = $grade->getCourse()->getNumberofCredits();
                    $gradepoints = $grade->getNumGrade() * $credit;
                    $tot_gradepoints += $gradepoints;
                    $total_credits += $credit;
                }

                $gpa = $tot_gradepoints / $total_credits;
                return number_format($gpa, 2);
            }

            return false;

        }

        // method for calculating and returning student's status
        public function getStatus() {

            $gpa = $this->getGPA();

            if ($gpa < 2) {
                $status = 'Unsatisfactory';
            } elseif ($gpa >= 2 && $gpa < 3) {
                $status = 'Satisfactory';
            } elseif ($gpa >= 3 && $gpa < 4) {
                $status = 'Honour';
            } else {
                $status = 'High Honour';
            }

            return $status;

        }

    }

?>
