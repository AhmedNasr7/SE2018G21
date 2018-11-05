<?php 

    require_once './init.inc.php';

    header("Content-type: application/json; charset=utf-8");

    if( $_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['phrase'])):
        $courses  = Course::getLike($_GET['phrase']);
        echo json_encode($courses,JSON_PRETTY_PRINT);
    else:

    endif;
?>