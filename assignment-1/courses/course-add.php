<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    Course::create($_POST['courseName'],$_POST['courseDegree'],$_POST['courseYear']);
    header('Location:'.PATH['courses-view']);
}

?>

<div class="container">
<table class="my-5 table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <form action=<?= PATH['course-add'] ?> method="POST">
        <th scope="row">00</th>
        <td>
          <input type="text" name="courseName" class="form-control" placeholder="name">
          <input type="text" name="courseDegree" class="form-control" placeholder="max degree">
          <input type="text" name="courseYear" class="form-control" placeholder="study year">
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