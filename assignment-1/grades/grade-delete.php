<?php

require_once './init.inc.php';

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['gradeId'])){
    Grade::removeById($_POST['gradeId']);
    $_SESSION['gradeDeleteSuccess'] = true;
    header('Location:'.PATH['grades-view']);
}