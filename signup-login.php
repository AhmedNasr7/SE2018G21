<?php

require_once './init.php';

if($_SERVER['REQUEST_METHOD']=='POST' && $_POST['type']=='logout'):
    session_unset();
    session_destroy();
    header('Location:'.DIRS::URL['home-page']);

elseif($_SERVER['REQUEST_METHOD']=='POST' && $_POST['type']=='login'):

    $user = new User();
    $flag = $user->getByUserName($_POST['username']);

    if($flag){
        if( sha1($_POST['password']) == $user->password ){
            $_SESSION['loggedinUser'] = $user;
            header('Location:'.DIRS::URL['home-page']);
        }
    }
    else {
        $_SESSION['Error-login'] = true;
        header('Location:'.DIRS::URL['home-page']);
    }

elseif($_SERVER['REQUEST_METHOD']=='POST' && $_POST['type']=='signup'):

    if( $_POST['password'] == $_POST['repassword'] ):
        $hashedPass = sha1($_POST['password']);

        $user = new User();
        $flag = $user->getByUserName($_POST['username']);

        if(!$flag){

            $acc_type = ($_POST['acc_type' == "1"])? 1: 0;

            $user->username = $_POST['username'];
            $user->usermail = $_POST['usermail'];
            $user->password = $hashedPass;
            $user->acc_type = $acc_type;

            $user->saveToDb();

            Profile::create('','','','','','',$user->id,null);

            $_SESSION['loggedinUser'] = $user;
            header('Location:'.DIRS::URL['home-page']);

        }else{
            $_SESSION['Error-signup-username'] = true;
            header('Location:'.DIRS::URL['home-page']);
        }

    else:
        $_SESSION['Error-signup-password'] = true;
        header('Location:'.DIRS::URL['home-page']);
    endif;

endif;

