<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    Grade::create($_POST['studentId'],$_POST['courseId'],$_POST['degree'],$_POST['date']);
    header('Location:'.PATH['grades-view']);
}

?>

<div class="container">
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
    <tr>
      <form action=<?= PATH['grade-add'] ?> method="POST">
        <th scope="row">00</th>
        <td>
          <input type="text" name="studentId" class="form-control" placeholder="student Id">
          <input type="text" name="courseId" class="form-control" placeholder="course Id">
          <input type="text" name="degree" class="form-control" placeholder="degree">
          <input type="date" name="date" class="form-control" placeholder="date">
        </td>
        <td>
          <input type="submit" class="btn btn-primary" value="Add" >
        </td>
      </form>
    </tr>
  </tbody>
</table>
</div>


<?php
require_once './layout/footer.inc.php';
?>