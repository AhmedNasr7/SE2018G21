<?php

require_once './config.inc.php';


/**
 * Models
 */
require_once './models/db.model.php';

require_once './models/student.model.php';
require_once './models/course.model.php';
require_once './models/grade.model.php';




/**
 * Db Connection
 */
Db::connect();
session_start();

