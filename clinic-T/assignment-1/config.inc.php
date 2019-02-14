<?php

/**
 * Database Config
 */

const DB_HOST = 'localhost';
const DB_DBNAME = 'collage';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';


/**
 * Routing
 */

 const PATH = [
    'home'              => './home.php',
    'students-view'     => './students.php?v=view',
    'student-edit'      => './students.php?v=edit',
    'student-add'       => './students.php?v=add',
    'student-delete'    => './students.php?v=delete',

    'courses-view'     => './courses.php?v=view',
    'course-edit'      => './courses.php?v=edit',
    'course-add'       => './courses.php?v=add',
    'course-delete'    => './courses.php?v=delete',
    
    
    
    'grades-view'     => './grades.php?v=view',
    'grade-edit'      => './grades.php?v=edit',
    'grade-add'       => './grades.php?v=add',
    'grade-delete'    => './grades.php?v=delete',
 ];

$var = 5;


 const DIRS = [
    /**
     * Static
     */
    'css-dir' => './static/css',
    'js-dir' => './static/js',
    
    'js-bootstrap-file' => './static/js/bootstrap.min.js',
    'js-jquery-file' => './static/js/jquery.js',
    'js-script-file' => './static/js/script.js',
    'css-bootstrap-file' => './static/css/bootstrap.min.css',


    'Student-model'     => './models/student.model.php',
    'Course-model'      => './models/course.model.php',
    
    /**
     * Student
     */
    'students-view'     => './students/students-view.php',
    'students-add'      => './students/student-add.php',
    'students-edit'     => './students/student-edit.php',
    'students-delete'   => './students/student-delete.php',



    /**
     * Course
     */
    'courses-view'     => './courses/courses-view.php',
    'course-add'      => './courses/course-add.php',
    'course-edit'     => './courses/course-edit.php',
    'course-delete'   => './courses/course-delete.php',
    'course-search'   => './course-search-json.php',
    


    /**
     * Grade
     */
    
    
    'grades-view'     => './grades/grades-view.php',
    'grade-add'      => './grades/grade-add.php',
    'grade-edit'     => './grades/grade-edit.php',
    'grade-delete'   => './grades/grade-delete.php',

 ];

?>

