<?php

/**
 * ### This page is dr controller 
 * domain_name.com/dr.php?v=view&id=5 will show dr profile of id 5 ... -- Get request with doctor id
 * domain_name.com/dr.php?v=edit will show dr profile -- POST request with dr id 
 */


require_once './init.php';



$page =  $_GET['v'] ? $_GET['v'] : 'view';


if($page == 'edit'):
    if($_SESSION['loggedinUser']->acc_type == 1):

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $user = $_SESSION['loggedinUser'];
            Profile::update($user->id , $_POST['first_name'],$_POST['last_name'],$_POST['address'],$_POST['phone'],null,$_POST['gender'],null);
            $_SESSION['success_updatet'] = true;
            header('Location:' . DIRS::URL['doctor-edit-profile']);
        }
        $user =  $_SESSION['loggedinUser'];
        $profile = Profile::getByUserId($user->id);
        require_once DIRS::PATH['views-dr-edit-profile'];

    endif;
else :
    /** else $page == view */

    if(!isset($_GET['drid'])){
        echo "No such doctor with this id go fuck your self";
    }else{

        $user = new User($_GET['drid']);

        if($user->acc_type == 0){
            header('Location:'.DIRS::URL['home-page']);
        }

        $profile = Profile::getByUserId($user->id);
    
        $clinics_ids = DrToClinics::getClinicsOfDrs($user->id);

        $clinics = [];

        foreach( $clinics_ids as $drToClinic ){
            array_push($clinics, DrToClinics::getClinicById($drToClinic['clinic_id']) );
        }
    
        require_once DIRS::PATH['views-dr-profile'];
    }

endif;
