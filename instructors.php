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

<?php foreach ($Courses as $Course) : ?>
    <?php $courseinstructor = $Course->getInstructorName(); ?>
        <div class="col-4">
        <h2 class="m-t-2"><?php echo $courseinstructor; ?></h2>
        <table class="table">
          <thead>
            <tr class="uppercase">
              <th class="text-center" scope="col">Course Code</th>
              <th class="text-center" scope="col">Course Name</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($Instructors as $Instructor) : ?>
                <tr>
                <?php $coursecode = $Course->getCourseCode(); ?>
                <?php $instructorName = $Instructor->get_InstructorName(); ?>
                <?php $courseCode = $Instructor->get_CourseCode(); ?>

                <?php if ($instructorName == $courseinstructor and $coursecode == $coursecode) : ?>

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
