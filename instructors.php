<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

require_once ('main.php');

include ('header.php');

?>

<div class="container">
    <div class="row">

<?php foreach ($Instructors as $Instructor) : ?>
<?php $instructor_name = $Instructor->get_InstructorName(); ?>
        <div class="col-4">
        <h2 class="m-t-2"><?php echo $Instructor->get_InstructorName(); ?></h2>
        <table class="table">
          <thead>
            <tr class="uppercase">
              <th class="text-center" scope="col">Course Code</th>
              <th class="text-center" scope="col">Course Name</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($Courses as $Course) : ?>
                <?php
                    $instructorname = $Course->getInstructorName();
                ?>
                <tr>
                    <?php if ($instructor_name == $instructorname) : ?>
                    <td class="text-center"><?php echo $Course->getCourseCode(); ?></td>
                    <td class="text-center"><?php echo $Course->getCourseName(); ?></td>

                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>

</div>
<?php endforeach; ?>
</div>
</div>

<?php


include ('footer.php');


?>
