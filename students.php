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
              <th class="text-center" scope="col">Student #</th>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Birthdate</th>
              <th class="text-center" scope="col">Courses Completed</th>
              <th class="text-center"scope="col">Courses Failed</th>
              <th class="text-center"scope="col">GPA</th>
              <th class="text-center"scope="col">Status</th>
            </tr>
          </thead>
          <tbody>
    <?php foreach ($Students as $Student) : ?>
            <tr onclick="window.location='#';">
                <?php if(property_exists($Student, 'student_nr')) : ?>
                    <td class="text-center"><?php echo $Student->getStudentNr(); ?></td>
                    <td><?php echo $Student->getName(); ?></td>
                    <td><?php echo $Student->getSurname(); ?></td>
                    <td><?php echo date('d.m.Y', $Student->getBirthdate()); ?></td>
                    <td class="text-center"><?php echo $Student->getCoursesCompleted(); ?></td>
                    <td class="text-center"><?php echo $Student->getCoursesFailed(); ?></td>
                    <td class="text-center"><?php echo $Student->getGPA(); ?></td>
                    <td class="text-center">
                        <?php
                            if ($Student->getGPA() < 2) {
                                echo 'unsatisfactory';
                            } elseif ($Student->getGPA() >= 2 && $Student->getGPA() < 3) {
                                echo 'satisfactory';
                            } elseif ($Student->getGPA() >= 3 && $Student->getGPA() < 4) {
                                echo 'honour';
                            } else {
                                echo 'high honour';
                            }
                        ?>
                    </td>
                <?php endif; ?>
            </tr>

    <?php endforeach; ?>
</tbody>
</table>
<div class="col-12">
    <p>
        Total number of students: <?php echo count($Students); ?>
    </p>
</div>
</div>

</div>

<?php

include ('footer.php');


?>
