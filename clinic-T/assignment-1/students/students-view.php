<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';



$students = Student::getAll();

?>

<div class="container">

<a href="<?= PATH['student-add'] ?>" class="mt-5 btn btn-info btn-block">Add new student</a>

<table class="my-5 table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <?php
        foreach( $students as $student ):
    ?>

        <tr>
        <th scope="row"><?= $student['id'] ?></th>
        <td><?= $student['name'] ?></td>
        <td>
            <a href="<?= PATH['student-edit'] ?>&id=<?= $student['id'] ?>" class="btn btn-primary">Edit</a>
            
            <form action="<?= PATH['student-delete'] ?>" method="POST" class="d-inline">
                <input type="hidden" name="studentId" value="<?= $student['id'] ?>">
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