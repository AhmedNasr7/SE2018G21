<?php

const DB_HOST = 'localhost';
const DB_DBNAME = 'health-tech';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

/** Online DB config
* const DB_HOST = 'db4free.net';
*const DB_DBNAME = 'healthtech';
*const DB_USERNAME = 'se2018g21';
*const DB_PASSWORD = 'se2018g21Healthtech';
 */

class DIRS {

    public const URL = [
        'home-page' =>'./index.php',

        'doctor-profile' => './dr.php?v=view',
        'doctor-edit-profile' => './dr.php?v=edit',

        'patient-profile' => './pat.php?v=view',
        'patient-edit-profile' => './pat.php?v=edit',
        
        /**
         * Appointment Add - delete POST request urls
         */
        'appointment-book' => './appointment.php?action=add',
        'appointment-delete' => './appointment.php?action=delete'
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

        'views-home' => './views/home.php',

        /** Dr profile */
        'static-imgs-dr-avatar' => './static/imgs/dr-avatar.jpg',
        'views-dr-profile' => './views/doctor-profile/dr-profile.view.php',
        'views-edit-profile' => './views/edit-profile/edit-profile.view.php',

        /** Edit Profiles */
        'views-edit-profile' => './views/edit-profile/edit-profile.view.php',

        /** Patient Profile */
        'views-patient-profile' => './views/patient-profile/pat-profile.view.php',
        'static-js-pat-profile' => './static/js/patient-profile/pat.js',
        'static-css-pat-profile' => './static/css/patient-profile/pat.css',
        'static-imgs-pat-avatar' => './static/imgs/pat-avatar.png',
        'static-imgs-clinic-logo' => './static/imgs/clinic-logo.png',
        
        /**
         * Clinic Profile
         */
        'views-clinic-profile' => './views/clinic-profile/clinic-profile-view.php',
        


        /**
         * Models
         */
        'models-DB'=>'./models/db.model.php',
        'models-user' => './models/user.model.php',
        'models-profile' => './models/profile.model.php',
        'models-dr-clinic-rel' => './models/dr-clinic-rel.model.php',
        'models-appointment' => './models/appintment.model.php',
        'models-clinic' => './models/clinic.model.php',


    ];

}


require_once DIRS::PATH['models-DB'];
require_once DIRS::PATH['models-user'];
require_once DIRS::PATH['models-profile'];
require_once DIRS::PATH['models-dr-clinic-rel'];
require_once DIRS::PATH['models-appointment'];
require_once DIRS::PATH['models-clinic'];



DB::connect();
session_start();