<?php

require_once './init.inc.php';

if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['studentId'])){
    Student::removeById($_POST['studentId']);
    header('Location: ./index.php');
}