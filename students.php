<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

include ('header.php');

?>
<main class="p-t-2">
    <div class="container">
    <h2 class="text-center">Registered Students</h2>
</div>

		<div id="student-table" class="container m-t-2">
			<div class="row header-row">
				<div class="col-1 text-center">#</div>
				<div class="col">First Name</div>
				<div class="col">Last Name</div>
				<div class="col d-none d-sm-block">Date of Birth</div>
                <div class="col d-none d-sm-block text-center">Courses Completed</div>
                <div class="col d-none d-sm-block text-center">Courses Failed</div>
                <div class="col-1 text-center">GPA</div>
                <div class="col-2">Status</div>
			</div>
            <?php

                usort($Students, function($a, $b) {
                    return $a->getGPA() < $b->getGPA();
                });

                foreach ($Students as $Student) :

                $id = $Student->getStudentNr();

            ?>
			<div class="row accordion-toggle table-row" data-toggle="collapse" data-target="#collapse-<?php echo $id; ?>">
                <div class="col-1 text-center"><?php echo $id; ?></div>
				<div class="col"><?php echo $Student->getName(); ?></div>
				<div class="col"><?php echo $Student->getSurname(); ?></div>
				<div class="col d-none d-sm-block"><?php echo $Student->getBirthdate(); ?></div>
                <div class="col d-none d-sm-block text-center"><?php echo $Student->getCoursesCompleted(); ?></div>
                <div class="col d-none d-sm-block text-center"><?php echo $Student->getCoursesFailed(); ?></div>
                <div class="col-1 text-center"><?php echo $Student->getGPA(); ?></div>
                <div class="col-2"><?php echo $Student->getStatus(); ?></div>
			</div>
			<div id="collapse-<?php echo $id; ?>" class="row collapse in grade-table">
				<div class="col-12">
                    <div class="row grade-header">
                        <div class="col">Course Code</div>
                        <div class="col">Course Name</div>
                        <div class="col">Number of Credits</div>
                        <div class="col">Grade</div>
                        <div class="col">Grade Points</div>
                    </div>
                </div>
                <?php foreach ($Student->getGrades() as $Grade) : ?>
                <div class="col-12 grade-row">
                    <div class="row">
                        <div class="col"><?php echo $Grade->getCourseNo(); ?></div>
                        <div class="col"><?php echo $Grade->getCourse()->getCourseName(); ?></div>
                        <div class="col"><?php echo $Grade->getCourse()->getNumberofCredits(); ?></div>
                        <div class="col uppercase"><?php echo $Grade->getGrade(); ?></div>
                        <div class="col"><?php echo $Grade->getGradepoints(); ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
			</div>
            <?php endforeach; ?>
		</div>
        <div class="container">
            <div class="row">
                <p>Total number of students: <?php echo count($Students); ?></p>
            </div>
        </div>
        </main>


<?php include ('footer.php'); ?>
