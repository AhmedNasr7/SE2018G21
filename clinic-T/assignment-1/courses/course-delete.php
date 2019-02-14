<?php

require_once './init.inc.php';

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['courseId'])){
    Course::removeById($_POST['courseId']);
    $_SESSION['courseDeleteSuccess'] = true;
    header('Location:'.PATH['courses-view']);
}