<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

require_once ('main.php');

include ('header.php');

?>

<div class="container">

<?php foreach ($Students as $Student) : ?>

    <?php $studentnr = $Student->getStudentNr(); ?>

<div class="row">
        <h2 class="m-t-2"><?php echo $Student->getName(); ?></h2>
        <table class="table">
          <thead>
            <tr class="uppercase">
              <th class="text-center" scope="col">Course Code</th>
              <th class="text-center" scope="col">Course Name</th>
              <th class="text-center" scope="col">Number of Credits</th>
              <th class="text-center" scope="col">Grade</th>
              <th class="text-center" scope="col">Grade points</th>
            </tr>
          </thead>
          <tbody>

        <?php

            $credit = 0;
            $tot_gradepoints = 0;
            foreach ($Courses as $Course) : ?>

            <tr>

            <?php foreach ($Grades as $Grade) : ?>
                <?php
                    $coursecode         = $Course->getCourseCode();
                    $studentno          = $Grade->getStudentNo();
                    $courseno           = $Grade->getCourseNo();
                    $numberofcredits    = $Course->getNumberofCredits();
                    $getgrade           = $Grade->getGrade();
                ?>

                <?php
                    if ($studentnr == $studentno and $coursecode == $courseno) :
                    $credit += intval($numberofcredits);
                    intval($getgrade);
                    $gradepoints = $numberofcredits * $getgrade;
                    $tot_gradepoints += $gradepoints;

                ?>

                    <td class="text-center"><?php echo $coursecode; ?></td>
                    <td class="text-center"><?php echo $Course->getCourseName(); ?></td>
                    <td class="text-center"><?php echo $numberofcredits; ?></td>
                    <td class="text-center"><?php echo $getgrade; ?></td>
                    <td class="text-center"><?php echo $gradepoints; ?></td>


                <?php endif; ?>

            <?php endforeach; ?>

        </tr>

        <?php endforeach; ?>

    </tbody>
</table>

</div>

<p>Total number of credits: <?php echo $credit; ?> | Total number of grade points: <?php echo $tot_gradepoints; ?> | GPA: <?php echo $tot_gradepoints / $credit; ?></p>

<?php endforeach; ?>

</div>

<?php


include ('footer.php');


?>
