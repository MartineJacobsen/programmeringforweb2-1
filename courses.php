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
<div class="container">
    <p class="text-center">Total number of courses: <?php echo count($Courses); ?></p>
</div>

		<div id="courses-table" class="container m-t-2">
			<div class="row header-row text-center">
				<div class="col-1">Course Code</div>
				<div class="col text-left">Course Name</div>
				<div class="col-1">Year</div>
				<div class="col-1 d-none d-md-block text-left">Semester</div>
                <div class="col d-none d-md-block text-left">Instructor</div>
                <div class="col-1 d-none d-md-block">Credits</div>
                <div class="col">No. of Students</div>
                <div class="col">Students Completed</div>
                <div class="col">Students Failed</div>
                <div class="col-1">Avg. Grade</div>
			</div>
            <?php

                // sort courses ascending according to number of students
                usort($Courses, function($c, $d) {
                return $c->getNumOfStudents() > $d->getNumOfStudents();
                });

                foreach ($Courses as $Course) :

                $id = $Course->getCourseCode();

            ?>
			<div class="row table-row text-center">
                <div class="col-1"><?php echo $id; ?></div>
				<div class="col text-left"><?php echo $Course->getCourseName(); ?></div>
				<div class="col-1"><?php echo $Course->getYear(); ?></div>
				<div class="col-1 d-none d-md-block text-left"><?php echo $Course->getSemester(); ?></div>
                <div class="col d-none d-md-block text-left"><?php echo $Course->getInstructor()->get_InstructorName(); ?></div>
                <div class="col-1 d-none d-md-block"><?php echo $Course->getNumberofCredits(); ?></div>
                <div class="col"><?php echo $Course->getNumOfStudents(); ?></div>
                <div class="col"><?php echo $Course->getStudentsCompleted(); ?></div>
                <div class="col"><?php echo $Course->getStudentsFailed(); ?></div>
                <div class="col-1"><?php echo $Course->getAverageGrade(); ?></div>
			</div>
            <?php endforeach; ?>
		</div>

        </main>

<?php include ('footer.php'); ?>
