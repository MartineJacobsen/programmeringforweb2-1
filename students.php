<?php

/*
 *  Martine Jacobsen
 *  Stud.nr: 141715
**/

include ('header.php');

require_once ('main.php');
require_once ('classes/Student.php');

?>

<div class="container">

    <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Student Number</th>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Birthdate</th>
              <th scope="col">Courses Completed</th>
              <th scope="col">Courses Failed</th>
            </tr>
          </thead>
          <tbody>
    <?php foreach ($main->getStudents() as $key => $Student) : ?>
        <tr>
            <?php if(property_exists($Student, 'student_nr')) : ?>

                <th><?php echo $Student->getStudentNr(); ?></th>
                <th><?php echo $Student->getName(); ?></th>
                <th><?php echo $Student->getSurname(); ?></th>
                <th><?php echo date('d.m.Y',$Student->getBirthdate()) ?></th>
                <th><?php echo $Student->getCoursesCompleted(); ?></th>
                <th><?php echo $Student->getCoursesFailed(); ?></th>

            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</div>

<?php

include ('footer.php');


?>
