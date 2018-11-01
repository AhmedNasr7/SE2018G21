<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
  $course = new Course($_GET['id']);
}

else if($_SERVER['REQUEST_METHOD']=='POST'){
  Course::update($_POST['courseId'],$_POST['courseName'],$_POST['courseDegree'],$_POST['courseYear']);
  header('Location:'.PATH['courses-view']);
}

?>

<div class="container">
<table class="my-5 table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <form action=<?= PATH['course-edit'] ?> method="POST">
        <th scope="row"><?= $course->id ?></th>
        <td>
          <input type="hidden" name="courseId" value="<?= $course->id ?>">
          <input type="text" name="courseName" class="form-control" value="<?= $course->name ?>">
          <input type="text" name="courseDegree" class="form-control" value="<?= $course->max_degree ?>">
          <input type="text" name="courseYear" class="form-control" value="<?= $course->study_year ?>">
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