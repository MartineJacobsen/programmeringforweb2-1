<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

include ('header.php');

?>

<main class="p-t-2">
    <div class="container">
    <h2 class="text-center">Instructors</h2>



<div class="row">


<?php foreach ($Instructors as $Instructor) : ?>
<div class="col-6">
    <h3 class="text-center"><?php echo $Instructor->get_InstructorName(); ?></h3>
			<div id="instructors-table" class="container-fluid m-t-2">
                <div class="row header-row text-center">
    				<div class="col">Course Code</div>
    				<div class="col">Course Name</div>
    			</div>
                <?php foreach ($Instructor->get_Courses() as $Course) :

                    $id = $Course->getCourseCode();

                ?>
    			<div class="row table-row text-center">
                    <div class="col"><?php echo $Course->getCourseCode(); ?></div>
    				<div class="col"><?php echo $Course->getCourseName(); ?></div>
    			</div>
                <?php endforeach; ?>
            </div>

</div>
        <?php endforeach; ?>
</div>
</div>
        </main>

<?php


include ('footer.php');


?>
