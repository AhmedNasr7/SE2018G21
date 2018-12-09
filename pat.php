<?php

require_once './init.php';


$page =  isset($_GET['v']) ? $_GET['v'] : 'view';


if($page == 'edit'):
    if($_SESSION['loggedinUser']->acc_type == 0):

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $user = $_SESSION['loggedinUser'];
            Profile::update($user->id , $_POST['first_name'],$_POST['last_name'],$_POST['address'],$_POST['phone'],null,$_POST['gender'],null);
            $_SESSION['success_updatet'] = true;
            header('Location:' . DIRS::URL['patient-edit-profile']);
        }
        $user =  $_SESSION['loggedinUser'];
        $profile = Profile::getByUserId($user->id);
        require_once DIRS::PATH['views-edit-profile'];


    endif;
else :
    /** else $page == view */

    if(!isset($_GET['pat_id'])){
        echo "No such patient with this";
    }else{

        $user = new User($_GET['pat_id']);

        if($user->acc_type == 1){
            header('Location:'.DIRS::URL['home-page']);
        }

        $profile = Profile::getByUserId($user->id);
    
        $clinics_ids = DrToClinics::getClinicsOfDrs($user->id);

        $clinics = [];

        foreach( $clinics_ids as $drToClinic ){
            array_push($clinics, DrToClinics::getClinicById($drToClinic['clinic_id']) );
        }
    
        require_once DIRS::PATH['views-patient-profile'];
    }

endif;



require_once DIRS::PATH['views-layout-footer'];