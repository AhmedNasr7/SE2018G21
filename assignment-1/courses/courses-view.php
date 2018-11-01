<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

$courses = Course::getAll();
?>

<div class="container">

<a href="<?= PATH['course-add'] ?>" class="mt-5 btn btn-info btn-block">Add new student</a>

<?php
if(isset($_SESSION['courseDeleteSuccess'])):
?>
<p class="mt-2 text-center alert alert-success">Course has been DELETED</p>
<?php 
unset($_SESSION['courseDeleteSuccess']);
endif;
?>

<table class="my-5 table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Max degree</th>
      <th scope="col">Study year</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php
        foreach( $courses as $course ):
    ?>

        <tr>
        <th scope="row"><?= $course['id'] ?></th>
        <td><?= $course['name'] ?></td>
        <td><?= $course['max_degree'] ?></td>
        <td><?= $course['study_year'] ?></td>
        <td>
            <a href="<?= PATH['course-edit'] ?>&id=<?= $course['id'] ?>" class="btn btn-primary">Edit</a>
            
            <form action="<?= PATH['course-delete'] ?>" method="POST" class="d-inline">
                <input type="hidden" name="courseId" value="<?= $course['id'] ?>">
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>

        </td>
        </tr>

    <?php
        endforeach;
    ?>

  </tbody>
</table>
</div>


<?php
require_once './layout/footer.inc.php';
?>