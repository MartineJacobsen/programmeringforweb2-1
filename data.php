<?php

    /*
    *  Martine Jacobsen
    *  Stud.nr: 141715
    **/

    include ('header.php');

?>

<main class="p-t-2 new">

    <div class="container">

        <h2 class="text-center">New Registrations</h2>

        <div class="row">

            <form enctype="multipart/form-data" method="post">
                <input type="radio" name="filetype" value="students" checked> Students<br>
                <input type="radio" name="filetype" value="grades"> Grades<br>
	<input type="file" name="file" value="" accept="application/csv">
	<input type="submit" name="" value="upload">
</form>

<?php
	// $_FILES refers to input type="file" and ['file'] refers to name="file"
	if(isset($_FILES['file'])) {
		$tmp_name = $_FILES['file']['tmp_name'];
        $filetype = $_POST['filetype'];

            /* if ( $filetype == 'students' ) {
                // get exsisting file of students
        		$csv = 'csv/students.csv';
                echo 'Your data was registered to ' . $filetype . ' successfully!';

            } elseif ( $filetype == 'grades' ) {
                // get exsisting file of students
        		$csv = 'csv/grades.csv';
                echo 'Your data was registered to ' . $filetype . ' successfully!';

            } */

            // get content of uploaded file

			$new = file_get_contents($tmp_name);
            $newarray = array_map('str_getcsv', file($tmp_name));

            $rows = $newarray;

            foreach ($rows as $row) {

                $row[0] = intVal($row[0]);

                $student = [$row[0], $row[1], $row[2], $row[3]];
                $grade   = [$row[0], $row[4], $row[5]];

                $test = array_keys($Students);

                if (!in_array($row[0], $test)) {

                    print_r($student);

                }
                echo '<pre>';
                var_dump($student);
                echo '</pre>';
            }



            // get content of exsisting file
			// $old = file_get_contents($csv);

			// file_put_contents($csv, $old.trim($new));

            /* echo '<pre>';
            print_r($rows);
            echo '</pre>'; */

	}



    /* echo '<div class="new"><pre>';
    var_dump(array_keys($Students));
    echo '</pre></div>'; */
?>







        </div>
    </div>
</main>

<?php include ('footer.php'); ?>
