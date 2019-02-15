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
            Profile::update($user->id , $_POST['first_name'],$_POST['last_name'],$_POST['address'],$_POST['phone'],$_POST['birth_day'],$_POST['gender'],null);
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
    
elseif ($page =='list'):

    $drs = DB::runQuery('SELECT users.id, users.usermail, profile.first_name, profile.last_name FROM `profile`, `users` WHERE users.acc_type = 1 AND profile.user_id = users.id');
    if($drs->rowCount()>0){
        $drs = $drs->fetchAll();
    }else{
        
    }
    require_once './views/doctor-profile/doctor-list.view.php';




else :
    /** else $page == view */

    $drid;
    if(!isset($_GET['drid'])){
        // echo "No such doctor with this";
        if($_SESSION['loggedinUser']->acc_type == 1){
            $drid = $_SESSION['loggedinUser']->id;
            var_dump($_SESSION['loggedinUser']);
        }else {
            header('Location:' . DIRS::URL['patient-profile'].'&pat_id='.$_SESSION['loggedinUser']->id);
        }
    }else{
        $drid = $_GET['drid'];
    }

    $dr = new User($drid);
    
    if($dr->acc_type == 0){
        /**
         * Error meesage with no doctor with this ID
         */
        // header('Location:'.DIRS::URL['home-page']);
    }

    $profile = Profile::getByUserId($dr->id);

    // if(empty((array)$profile)){
    //     header('Location:'.DIRS::URL['doctor-edit-profile']);
    // }

    $clinics_ids = DrToClinics::getClinicsOfDrs($dr->id);

    $clinics = [];

    foreach( $clinics_ids as $clinicID ){
        array_push($clinics, DrToClinics::getClinicById($clinicID['clinic_id']) );
    }

    $drAppointments = Appointment::getByDrId($dr->id);

    require_once DIRS::PATH['views-dr-profile'];


endif;

