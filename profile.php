<?php
session_start();
include 'dbctrl.php';
include 'view.php';

$view = new Views;

if(empty($_SESSION['ID'])){
    echo 'no logging';
}else{
    if($uc->checkUserExist($_GET['ID'])){
        $userdata = $uc->getAllUserData($_GET['ID']);

        if(empty($_GET['update'])){
            $view->load('profile',$userdata);
        }else{
            if($_SESSION['ID']!=$_GET['ID']) break;
            switch($_GET['update']){
                case 'profile':
                    $view->load('updateProfile',$userdata);
                    break;
                case 'photo':
                    $view->load('updatePhoto',$userdata);
                    break;
                default:
                    echo '404';
            }
        }
    }else{
        echo '404';
    }
}
