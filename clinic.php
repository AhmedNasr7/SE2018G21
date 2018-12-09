<?php

require_once './config.php';



$page =  isset($_GET['action']) ? $_GET['action'] : 'view';


if($page == 'add'):

elseif($page == 'join'):

else:
    /**
     * View Clinic page
     */

    
    if(!isset($_GET['clinicid'])){
        echo "No such Fucking clinic with this ID go Fuck your self";
    }else{

        require_once './init.php';
    
        require_once DIRS::PATH['views-clinic-profile'];
    }

endif;