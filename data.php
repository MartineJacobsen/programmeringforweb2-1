<?php

/*
*  Martine Jacobsen
*  Stud.nr: 141715
**/

include ('header.php');

?>

    <main class="p-t-2 test">

        <div class="container">

            <h2 class="text-center p-b-2">New Registrations</h2>

        </div>

        <div class="container upload-table">
            <div class="row header-row">
                <div class="col text-center">Upload new file</div>
            </div>

            <div id="form-wrapper" class="row table-row text-center">
                <!-- encype="multipart/form-data" allows for file upload -->
                <form enctype="multipart/form-data" method="post" class="col-12">

                    <input type="file" name="file" value="" accept="application/csv">
                    <input type="submit" name="" value="upload">

                </form>

            </div>

            <div id="upload-msg-wrapper" class="row table-row text-center">

            <?php
                // $_FILES refers to input type="file" and ['file'] refers to name="file"
                if(!empty($_FILES['file'])) :
                    $tmp_name = $_FILES['file']['tmp_name'];

                    // get existing files
                    $studs_csv = 'csv/students.csv';
                    $grades_csv = 'csv/grades.csv';

                    // get content of existing files
                    $old_students = file_get_contents($studs_csv);
                    $old_grades = file_get_contents($grades_csv);

                    // get content of uploaded file and convert to array
                    $newarray = array_map('str_getcsv', file($tmp_name));

                    $new_student = "";
                    $new_grade = "";
                    $newstudent = "";
                    $newgrade = ""; ?>


                    <?php foreach ($newarray as $row) : // iterate over array, returning current element

                        // declaring value in first element as integer
                        $row[0] = intVal($row[0]);

                        // declaring values to put in students.csv and grades.csv
                        $student = [$row[0], $row[1], $row[2], $row[3]];
                        $grade   = [$row[0], $row[4], $row[5]];

                        // get array keys of $Students objects
                        $test = array_keys($Students); ?>

                        <?php if(in_array($row[0], $test)) : // check if studentnr exist in $Student object ?>

                            <?php if ($Students[$row[0]]) :

                                // convert each students grades to array with course code
                                $codes = array_map(function($grade){ return $grade->getCourse()->getCourseCode(); }, $Students[$row[0]]->getGrades()); ?>

                                <?php if (!in_array($row[4], $codes)) : // check if combination of studentnr and course code already exists

                                    $new_grade = implode(',', $grade);

                                    // concatenate to put all content
                                    $newgrade .= $new_grade . "\n";
                                    file_put_contents($grades_csv, $old_grades."\n".trim($newgrade)); ?>

                                    <div class="col-12 upload-msg success">
                                        New grade for existing student with Name: <b><?php echo $row[1] . ' ' . $row[2]; ?></b> is added for course: <b><?php echo $row[4]; ?></b>
                                    </div>

                                <?php else : // if student already have a grade in course, echo message ?>

                                    <div class="col-12 upload-msg error">Grade is already registered for student with Name: <b><?php echo $row[1] . ' ' . $row[2]; ?></b> and for course: <b><?php echo $row[4]; ?></b></div>

                                <?php endif; ?>
                            <?php endif; ?>

                        <?php elseif (!in_array($row[0], $test)) : // check if studentnr doesn't already exist and add new student

                            $new_student = implode(',', $student);

                            $new_grade = implode(',', $grade);

                            // concatenate to put all content
                            $newstudent .= $new_student;
                            file_put_contents($studs_csv, $old_students."\n".trim($newstudent)); ?>
                            <div class="col-12 upload-msg success">New student with Name: <b> <?php echo $row[1] . ' ' . $row[2]; ?> </b> is added</div>

                            <?php $newgrade .= $new_grade . "\n"; // concatenate to put all content
                            file_put_contents($grades_csv, $old_grades."\n".trim($newgrade)); ?>
                            <div class="col-12 upload-msg success">New grade for student with Name: <b> <?php echo $row[1] . ' ' . $row[2]; ?> </b> is added for course: <?php echo $row[4]; ?></div>
                        <?php endif; ?>

                    <?php endforeach; ?>
                <?php endif; ?>
                </div>

    </main>

<?php include ('footer.php'); ?>