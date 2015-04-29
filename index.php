<?php
session_start();
include 'dbctrl.php';
include 'view.php';

$view = new Views;

if(empty($_SESSION['ID'])){
    $view->load('index','');
}else{
    if(empty($_GET['fliter'])){
        $_GET['fliter']='school';
    }

    switch($_GET['fliter']){
        case 'school':
            $query = "`school` = '".$_SESSION['school']."' and `ID` !='".$_SESSION['ID']."'";
            $userlist = $uc->selectUserList($query);
            break;
        case 'dept':
            $query = "`department` = '".$_SESSION['department']."' and `ID` !='".$_SESSION['ID']."'";
            $userlist = $uc->selectUserList($query);
            break;
        case 'upper':
            $query = "`grade` > '".$_SESSION['grade']."'";
            $userlist = $uc->selectUserList($query);
            break;
        case 'under':
            $query = "`grade` < '".$_SESSION['grade']."' and `grade` != 0";
            $userlist = $uc->selectUserList($query);
            break;
        default:
            $userlist = array();
    }
    $view->load('main',$userlist);
}
