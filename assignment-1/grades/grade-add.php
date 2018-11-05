<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    Grade::create($_POST['studentId'],$_POST['courseId'],$_POST['degree'],$_POST['date']);
    header('Location:'.PATH['grades-view']);
}

$students = Student::getAll();
$courses = Course::getALl();

?>

<div class="container">
<table class="my-5 table table-striped">
  <thead>
  </thead>
  <tbody>
    <tr>
      <form action=<?= PATH['grade-add'] ?> method="POST">
        <th scope="row">00</th>
        <td>
          <select name="studentId" class="form-control">
                <option> SELECT STUDENT </option>
            <?php
                foreach($students as $student):
            ?>
                <option value="<?= $student['id'] ?>"> <?= $student['name'] ?> </option>
            <?php
                endforeach;
            ?>
          </select>
          <select name="courseId" class="form-control">
                <option> SELECT COURSE </option>

            <?php
                foreach($courses as $course):
            ?>
                <option value="<?= $course['id'] ?>"> <?= $course['name'] ?> </option>
            <?php
                endforeach;
            ?>
            
          </select>
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