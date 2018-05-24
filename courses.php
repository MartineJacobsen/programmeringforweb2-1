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
        <h3 class="p-t-2">Registered students</h3>
        <table class="table m-t-2">
          <thead>
            <tr class="uppercase">
              <th scope="col">Course Code</th>
              <th scope="col">Course Name</th>
              <th scope="col">Year</th>
              <th scope="col">Semester</th>
              <th scope="col">Instructor Name</th>
              <th class="text-center" scope="col">Number of Credits</th>
            </tr>
          </thead>
          <tbody>
    <?php foreach ($Courses as $Course) : ?>
            <tr onclick="window.location='#';">
                <?php if(property_exists($Course, 'course_code')) : ?>
                    <td><?php echo $Course->getCourseCode(); ?></td>
                    <td><?php echo $Course->getCourseName(); ?></td>
                    <td><?php echo $Course->getYear(); ?></td>
                    <td><?php echo $Course->getSemester(); ?></td>
                    <td><?php echo $Course->getInstructorName(); ?></td>
                    <td class="text-center"><?php echo $Course->getNumberofCredits(); ?></td>
                <?php endif; ?>
            </tr>

    <?php endforeach; ?>
</tbody>
</table>
<div class="col-12">
    <p>
        Total number of courses: <?php echo count($Courses); ?>
    </p>
</div>
</div>

</div>

<?php

include ('footer.php');


?>
