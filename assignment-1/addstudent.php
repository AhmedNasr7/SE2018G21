<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    Student::create($_POST['studentName']);
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
        <th scope="row">00</th>
        <td>
          <input type="text" name="studentName" class="form-control" placeholder="name">
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