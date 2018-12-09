<?php

require_once './config.php';



$page =  isset($_GET['action']) ? $_GET['action'] : 'List';


if($page == 'add'):

    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser']->acc_type == 1){
        $clinicid = Clinic::addToDb($_POST['name'],$_POST['address'],$_POST['phone'],$_POST['desc']);
        DrToClinics::createRel($_POST['dr_id'],$clinicid);
        header('Location:'.DIRS::URL['clinic-profile'].'&clinicid='.$clinicid);
    }else{
        header('Location:'.DIRS::URL['home-page']);
    }

elseif($page == 'join'):
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser']->acc_type == 1){
        DrToClinics::createRel($_SESSION['loggedinUser']->id,$_POST['clinic_id']);
        header('Location:'.DIRS::URL['clinic-profile'].'&clinicid='.$_POST['clinic_id']);
    }else{
        header('Location:'.DIRS::URL['home-page']);
    }
    
    elseif($page == 'delete'):
        
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_SESSION['loggedinUser']) && $_SESSION['loggedinUser']->acc_type == 1){
            Clinic::removeById($_POST['clinic_id']);
            header('Location:'.DIRS::URL['clinic-list']);
        }else{
            header('Location:'.DIRS::URL['clinic-list']);
        }

elseif($page == 'view'):
    
    if(!isset($_GET['clinicid'])){
        echo "No such Fucking clinic with this ID go Fuck your self";
    }else{

        require_once './init.php';
        
        $clinic = new Clinic($_GET['clinicid']);
        $rows = DrToClinics::getClinicsOfDrs($_SESSION['loggedinUser']->id);
        $loggedUserClincsIds = [];
        foreach($rows as $row){
            array_push($loggedUserClincsIds, $row['clinic_id']);
        }
        require_once DIRS::PATH['views-clinic-profile'];
    }
    
else:
    /**
     * List Clinic page
     */
    
    require_once './init.php';
    $clinics = Clinic::getAll();
    
    if(isset($_SESSION['loggedinUser'])){
        $rows = DrToClinics::getClinicsOfDrs($_SESSION['loggedinUser']->id);
        $loggedUserClincsIds = [];
        foreach($rows as $row){
            array_push($loggedUserClincsIds, $row['clinic_id']);
        }
    }

    require_once DIRS::PATH['views-clinic-list'];

    require_once DIRS::PATH['views-layout-footer'];
    
endif;