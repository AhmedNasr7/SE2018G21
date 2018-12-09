<?php


/**
 * No view to this page only post request adding or deleting appointment
 */

require_once './config.php';



$page =  isset($_GET['action']) ? $_GET['action'] : 'view';

if($_SERVER['REQUEST_METHOD']=='POST' && $page != 'view'){

    if($page == 'add'):
        /**
         * POST REQUEST with pat_id , dr_id clinic_id , date
         */

        $lastid = Appointment::addToDb($_POST['date'],$_POST['clinic_id'],$_POST['dr_id'],$_POST['pat_id']);
        header('Location:'.DIRS::URL['doctor-profile'].'&drid='.$_POST['dr_id'].'&lastid='.$lastid);
    elseif($page == 'delete'):
        /**
         * POST REQUEST with Appointment ID to delete
         */
        Appointment::removeById($_POST['id']);
        header('Location:'.DIRS::URL['doctor-profile'].'&drid='.$_POST['dr_id']);
    else:
        
    endif;

} else {
    header('Locatoion:'.DIRS::URL['home-page']);
}