<?php

/**
 * ### This page is dr controller 
 * domain_name.com/dr.php?v=view&id=5 will show dr profile of id 5 ... -- Get request with doctor id
 * domain_name.com/dr.php?v=edit will show dr profile -- POST request with dr id 
 */


require_once './init.php';



$page =  isset($_GET['v']) ? $_GET['v'] : 'view';


if($page == 'edit'):
    /**
     * Edit page /dr.php?v=edit
     * 
     */
    if($_SESSION['loggedinUser']->acc_type == 1):

        if($_SERVER['REQUEST_METHOD']=='POST'){ /** Get Updated data from post request */
            $user = $_SESSION['loggedinUser']; /** Capture logged in user */
            Profile::update($user->id , $_POST['first_name'],$_POST['last_name'],$_POST['address'],$_POST['phone'],null,$_POST['gender'],null);
            $_SESSION['success_updatet'] = true;
            header('Location:' . DIRS::URL['doctor-profile'].'&drid='.$_SESSION['loggedinUser']->id);
        } 
        /** if no POST request -> View edit page */
        $user =  $_SESSION['loggedinUser'];
        $profile = Profile::getByUserId($user->id);
        if(empty((array)$profile)){
            $profile = Profile::create('','','','','','',$user->id,null);
        }
        $profile = Profile::getByUserId($user->id);
        require_once DIRS::PATH['views-dr-edit-profile'];

    endif;
else :
    /** else $page == view */

    if(!isset($_GET['drid'])){
        echo "No such Fucking Doctor with this ID go Fuck your self";
    }else{

        $dr = new User($_GET['drid']);

        if($dr->acc_type == 0){
            /**
             * Error meesage with no doctor with this ID
             */
            header('Location:'.DIRS::URL['home-page']);
        }

        $profile = Profile::getByUserId($dr->id);

        if(empty((array)$profile)){
            header('Location:'.DIRS::URL['doctor-edit-profile']);
        }
    
        $clinics_ids = DrToClinics::getClinicsOfDrs($dr->id);

        $clinics = [];

        foreach( $clinics_ids as $clinicID ){
            array_push($clinics, DrToClinics::getClinicById($clinicID['clinic_id']) );
        }

        $drAppointments = Appointment::getByDrId($dr->id);
    
        require_once DIRS::PATH['views-dr-profile'];
    }

endif;
