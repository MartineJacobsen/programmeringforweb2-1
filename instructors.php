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

<?php

    // array to store Instructor names
    $duplicats = [];

    foreach ($Instructors as $Instructor) :
        $instructor_name = $Instructor->get_InstructorName();

        // check for duplicates of Instructor name
        if(in_array($instructor_name, $duplicats)) continue;
        $duplicats[] = $instructor_name;

    ?>
        <div class="col-6">
        <h2 class="m-t-2"><?php echo $Instructor->get_InstructorName(); ?></h2>
        <table class="table">
          <thead>
            <tr class="uppercase">
              <th class="text-center" scope="col">Course Code</th>
              <th class="text-center" scope="col">Course Name</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ($Courses as $Course) : // looping throug all Courses objects, definding each object as a single ?>
                <?php
                    // create variable for getting Instructor name
                    $instructorname = $Course->getInstructorName();
                ?>
                <tr>
                    <?php if ($instructor_name == $instructorname) : // check if value exist in both Instructor and Course ?>
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
