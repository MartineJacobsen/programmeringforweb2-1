<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

require_once ('classes/Student.php');

class Main {

    function __construct() {

        $this-> run_file();

    }

    private function run_file() {

        // Read CSV and make array
        $students = array_map('str_getcsv', file('./csv/students.csv'));

    }

}

?>
