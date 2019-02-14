<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
  $student = new Student($_GET['id']);
}

else if($_SERVER['REQUEST_METHOD']=='POST'){
  Student::update($_POST['studentId'],$_POST['studentName']);
  header('Location: students.php');
}

?>

<div class="container">
<table class="my-5 table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <form action="" method="POST">
        <th scope="row"><?= $student->id ?></th>
        <td>
          <input type="hidden" name="studentId" value="<?= $student->id ?>">
          <input type="text" name="studentName" class="form-control" value="<?= $student->name ?>">
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