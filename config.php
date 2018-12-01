<?php

const DB_HOST = 'localhost';
const DB_DBNAME = 'health-tech';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

class DIRS {

    public const URL = [
        'home-page' =>'./index.php',

        'doctor-profile' => './dr.php',
    ];

    public const PATH = [
        /**
         * CSS
         */
        'static-css-main'=>'./static/css/main.css',
        'static-css-bootstrap'=>'./static/css/bootstrap.min.css',

        /**
         * JS
         */
        'static-js-main'=>'./static/js/main.js',
        'static-js-bootstrap'=>'./static/js/bootstrap.min.js',
        'static-js-jquery'=>'./static/js/jquery.js',


        /**
         * layout
         */
        'views-layout-header' => './views/layout/header.inc.php',
        'views-layout-footer' => './views/layout/footer.inc.php',
        'views-layout-nav' => './views/layout/nav.inc.php',

        /** Dr profile */
        'static-imgs-dr-avatar' => './static/imgs/dr-avatar.jpg',
        'views-dr-profile' => './views/doctor-profile/dr-profile.view.php',




        /**
         * Models
         */
        'models-DB'=>'./models/db.model.php',
        'models-user' => './models/user.model.php',

    ];

}


require_once DIRS::PATH['models-DB'];
require_once DIRS::PATH['models-user'];
