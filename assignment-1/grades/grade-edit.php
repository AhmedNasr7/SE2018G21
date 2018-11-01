<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
  $grade = new Grade($_GET['id']);
}

else if($_SERVER['REQUEST_METHOD']=='POST'){
  grade::update($_POST['gradeId'],$_POST['studentId'],$_POST['courseId'],$_POST['degree'],$_POST['date']);
  header('Location:'.PATH['grades-view']);
}

?>

<div class="container">
<table class="my-5 table table-striped">
  <thead>
  </thead>
  <tbody>
    <tr>
      <form action=<?= PATH['grade-edit'] ?> method="POST">
        <th scope="row"><?= $grade->id ?></th>
        <td>
          <input type="hidden" name="gradeId" value="<?= $grade->id ?>">
          <input type="text" name="studentId" class="form-control" value="<?= $grade->student_id ?>">
          <input type="text" name="courseId" class="form-control" value="<?= $grade->course_id ?>">
          <input type="text" name="degree" class="form-control" value="<?= $grade->degree ?>">
          <input type="date" name="date" class="form-control" value="<?= $grade->examine_at ?>">
        </td>
        <td>
          <input type="submit" class="btn btn-primary" value="Save" >
        </td>
      </form>
    </tr>
  </tbody>
</table>
</div>


<?php
require_once './layout/footer.inc.php';
?>