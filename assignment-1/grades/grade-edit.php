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

$students = Student::getAll();
$courses = Course::getALl();

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
          <select name="studentId" class="form-control">
            <?php
                foreach($students as $student):
            ?>
                <option value="<?= $student['id'] ?>" <?php echo ( ($student['id']==$grade->student_id)? 'selected' : '' ); ?> > <?= $student['name'] ?> </option>
            <?php
                endforeach;
            ?>
          </select>
          <select name="courseId" class="form-control">
            <?php
                foreach($courses as $course):
            ?>
                <option value="<?= $course['id'] ?>" <?php echo ( ($course['id']==$grade->course_id)? 'selected' : '' ); ?> > <?= $course['name'] ?> </option>
            <?php
                endforeach;
            ?>
          </select>
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