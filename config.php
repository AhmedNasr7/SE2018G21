<?php

const DB_HOST = 'localhost';
const DB_DBNAME = 'health-tech';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

class DIRS {

    public const URL = [
        'home-page' =>'./index.php',

        'doctor-profile' => './dr.php?v=view',
        'doctor-edit-profile' => './dr.php?v=edit',
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
        'static-js-jquery.min'=>'./static/js/jquery.min.js',


        /**
         * layout
         */
        'views-layout-header' => './views/layout/header.inc.php',
        'views-layout-footer' => './views/layout/footer.inc.php',
        'views-layout-nav' => './views/layout/nav.inc.php',


        /**
            Home
        */

        'views-home' => './views/home.php',

        /** Dr profile */
        'static-imgs-dr-avatar' => './static/imgs/dr-avatar.jpg',
        'views-dr-profile' => './views/doctor-profile/dr-profile.view.php',
        'views-dr-edit-profile' => './views/doctor-profile/edit-profile.view.php',

        /** Patient Profile */
        'views-patient-profile' => './views/patient-profile/pat-profile.view.php',
        'static-js-pat-profile' => './static/js/patient-profile/pat.js',
        'static-css-pat-profile' => './static/css/patient-profile/pat.css',
        'static-imgs-pat-avatar' => './static/imgs/pat-avatar.png',
        'static-imgs-clinic-logo' => './static/imgs/clinic-logo.png',



        /**
         * Models
         */
        'models-DB'=>'./models/db.model.php',
        'models-user' => './models/user.model.php',
        'models-profile' => './models/profile.model.php',

    ];

}


require_once DIRS::PATH['models-DB'];
require_once DIRS::PATH['models-user'];
