<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

$grades = Grade::getAll();
?>

<div class="container">

<a href="<?= PATH['grade-add'] ?>" class="mt-5 btn btn-info btn-block">Add new student</a>

<?php
if(isset($_SESSION['gradeDeleteSuccess'])):
?>
<p class="mt-2 text-center alert alert-success">grade has been DELETED</p>
<?php 
unset($_SESSION['gradeDeleteSuccess']);
endif;
?>

<table class="my-5 table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Id</th>
      <th scope="col">Course Id</th>
      <th scope="col">Degree</th>
      <th scope="col">Examine At</th>
    </tr>
  </thead>
  <tbody>

    <?php
        foreach( $grades as $grade ):
    ?>

        <tr>
        <th scope="row"><?= $grade['id'] ?></th>
        <td><?= $grade['student_id'] ?></td>
        <td><?= $grade['course_id'] ?></td>
        <td><?= $grade['degree'] ?></td>
        <td><?= $grade['examine_at'] ?></td>
        <td>
            <a href="<?= PATH['grade-edit'] ?>&id=<?= $grade['id'] ?>" class="btn btn-primary">Edit</a>
            
            <form action="<?= PATH['grade-delete'] ?>" method="POST" class="d-inline">
                <input type="hidden" name="gradeId" value="<?= $grade['id'] ?>">
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