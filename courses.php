<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

include ('header.php');

?>

<main class="p-t-2">
    <div class="container">
    <h2 class="text-center">Courses</h2>
</div>

		<div id="courses-table" class="container m-t-2">
			<div class="row header-row text-center">
				<div class="col-2">Course Code</div>
				<div class="col-2">Course Name</div>
				<div class="col-1">Year</div>
				<div class="col d-none d-sm-block text-left">Semester</div>
                <div class="col d-none d-sm-block text-left">Instructor</div>
                <div class="col-1 d-none d-sm-block">Credits</div>
                <div class="col">No. of Students</div>
			</div>
            <?php foreach ($Courses as $Course) :

                $id = $Course->getCourseCode();

            ?>
			<div class="row table-row text-center">
                <div class="col-2"><?php echo $id; ?></div>
				<div class="col-2"><?php echo $Course->getCourseName(); ?></div>
				<div class="col-1"><?php echo $Course->getYear(); ?></div>
				<div class="col d-none d-sm-block text-left"><?php echo $Course->getSemester(); ?></div>
                <div class="col d-none d-sm-block text-left"><?php echo $Course->getInstructorName(); ?></div>
                <div class="col-1 d-none d-sm-block"><?php echo $Course->getNumberofCredits(); ?></div>
                <div class="col"><?php echo $Course->getStudents(); ?></div>
			</div>
            <?php endforeach; ?>
		</div>
        <div class="container">
            <div class="row">
                <p>Total number of courses: <?php echo count($Courses); ?></p>
            </div>
        </div>
        </main>

<?php include ('footer.php'); ?>
