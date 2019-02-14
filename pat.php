<?php

require_once './init.php';


$page =  isset($_GET['v']) ? $_GET['v'] : 'view';

if($page == 'edit'):
    if($_SESSION['loggedinUser']->acc_type == 0):

        if($_SERVER['REQUEST_METHOD']=='POST'){ /** Get Updated data from post request */
            $user = $_SESSION['loggedinUser']; /** Capture logged in user */
            Profile::update($user->id , $_POST['first_name'],$_POST['last_name'],$_POST['address'],$_POST['phone'],null,$_POST['gender'],null);
            $_SESSION['success_updatet'] = true;
            header('Location:' . DIRS::URL['patient-profile'].'&patid='.$_SESSION['loggedinUser']->id);
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