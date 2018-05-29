<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

    class Course {

        private $course_code, $course_name, $year, $semester, $no_credits, $students = [], $grades = [], $instructor;

        function __construct($course_code, $course_name, $year, $semester, $no_credits) {

            $this->course_code      = $course_code;
            $this->course_name      = $course_name;
            $this->year             = $year;
            $this->semester         = $semester;
            $this->no_credits       = intval($no_credits);

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

        // method for set instructor
        public function setInstructor($instructor) {
            $this->instructor = $instructor;
        }

        // method for getting courses completed
        public function getInstructor() {
            return $this->instructor;
        }

        // method for getting courses completed
        public function getNumberofCredits() {
            return $this->no_credits;
        }

        public function setGrades($grades) {
            $this->grades[] = $grades;
        }

        public function getGrades() {
            return $this->grades;
        }

        public function getNumOfStudents() {
            return count($this->grades);
        }

        public function getAverageGrade() {

            $tot_gradesum = 0;

            foreach ($this->grades as $grade) {

                $gradesum = $grade->getNumGrade();
                $tot_gradesum += $gradesum;

            }

            $avggradesum = number_format(($tot_gradesum / $this->getNumOfStudents()), 2);

            if ($avggradesum < 1) {
                return 'F';
            } elseif ($avggradesum >= 1 && $avggradesum < 2) {
                return 'E';
            } elseif ($avggradesum >= 2 && $avggradesum < 3) {
                return 'D';
            } elseif ($avggradesum >= 3 && $avggradesum < 4) {
                return 'C';
            } elseif ($avggradesum >= 4 && $avggradesum < 5) {
                return 'B';
            } else {
                return 'A';
            }
        }

        public function getStudentsCompleted() {

            $students_completed = 0;

            foreach ($this->grades as $grade) {

                if ($grade->getNumGrade() > 0) {
                    $students_completed++;
                }
            }

            return $students_completed;

        }

        public function getStudentsFailed() {
            return count($this->grades) - $this->getStudentsCompleted();

        }

    }

?>
