<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

require_once ('classes/Student.php');

class Main {

    public $students = [];

    function __construct() {

        $this-> run_file();

    }

    private function run_file() {

        // Read CSV and make array
        $students = array_map('str_getcsv', file('./csv/students.csv'));
        $students = array_shift($students);

        foreach ($students as $student) {
            $this->students[] = new Student ($student[0],$student[1],$student[2],$student[3],$student[4]);
        }

    }

}

$main = new Main();

?>
