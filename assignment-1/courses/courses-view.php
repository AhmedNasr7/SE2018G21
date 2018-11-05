<?php

require_once './init.inc.php';


require_once './layout/header.inc.php';
require_once './layout/nav.inc.php';

$courses = Course::getAll();
?>

<div class="container">


<?php
if(isset($_SESSION['courseDeleteSuccess'])):
    ?>
<p class="mt-2 text-center alert alert-success">Course has been DELETED</p>
<?php 
unset($_SESSION['courseDeleteSuccess']);
endif;
?>

    <p class="display-4 text-center my-5">Courses</p>

    <div class="form-group my-3">
        <label class="lead">Search courses</label>
        <input type="text" name="courseName" id="courseNameSearchField" class="form-control" placeholder="Enter course name">
    </div>

    <div class="table-responsive">
        <table id="coursesSearchTable" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Max degree</th>
                    <th scope="col">Study year</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>



</div>


<?php
require_once './layout/footer.inc.php';
?>