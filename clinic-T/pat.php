<?php

require_once './init.php';


$page =  isset($_GET['v']) ? $_GET['v'] : 'view';


if($page == 'edit'):

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $user = $_SESSION['loggedinUser'];
        Profile::update($user->id , $_POST['first_name'],$_POST['last_name'],$_POST['address'],$_POST['phone'],null,$_POST['gender'],null);
        $_SESSION['success_updatet'] = true;
        header('Location:' . DIRS::URL['patient-edit-profile']);
    }
    $user =  $_SESSION['loggedinUser'];
    $profile = Profile::getByUserId($user->id);
    if(empty((array)$profile)){
            $profile = Profile::create('','','','','','',$user->id,null);
    }
    if(($profile->user_id)==($_SESSION['loggedinUser']->id)){
        require_once DIRS::PATH['views-edit-profile'];
    }else{}

    

else :
    /** else $page == view */
    $pat_id;

    if(!isset($_GET['pat_id'])){    
        echo "Invalid Profile";
        $pat_id = $_SESSION['loggedinUser']->id;
    }else {
        $pat_id = $_GET['pat_id'];
    }

    $user = new User($pat_id);

    if($user->acc_type == 1){
        header('Location:'.DIRS::URL['home-page']);
    }

    $profile = Profile::getByUserId($user->id);
    require_once DIRS::PATH['views-patient-profile'];

endif;



require_once DIRS::PATH['views-layout-footer'];



//function to send query to data-base
function send_query($que)
{

        global $connection;
        $query = $que;
        $result = mysqli_query($connection,$query);
        return $result;
}