<?php
session_start();
include 'dbctrl.php';
$uc->updateUserData($_POST['id'],$_POST['fblink'],$_POST['fullname'],$_POST['gender'],$_POST['sID'],$_POST['school'],$_POST['department'],$_POST['grade'],$_POST['ticketnum'],$_POST['googleplus'],$_POST['twitter'],$_POST['plurk'],$_POST['line'],$_POST['github'],$_POST['linkedin'],$_POST['weibo'],$_POST['wechat'],$_POST['mail']);
$userdata = $uc->getAllUserData($_SESSION['ID']);

$_SESSION['fullname'] = $userdata['fullname'];
$_SESSION['fblink'] = $userdata['FBlink'];
$_SESSION['gender'] = $userdata['gender'];
$_SESSION['sID'] = $userdata['sID'];
$_SESSION['school'] = $userdata['school'];
$_SESSION['department'] = $userdata['department'];
$_SESSION['grade'] = $userdata['grade'];
$_SESSION['ticketnum'] = $userdata['ticketnum'];
$_SESSION['googleplus'] = $userdata['googleplus'];
$_SESSION['twitter'] = $userdata['twitter'];
$_SESSION['plurk'] = $userdata['plurk'];
$_SESSION['line'] = $userdata['line'];
$_SESSION['github'] = $userdata['github'];
$_SESSION['linkedin'] = $userdata['linkedin'];
$_SESSION['weibo'] = $userdata['weibo'];
$_SESSION['wechat'] = $userdata['wechat'];
$_SESSION['mail'] = $userdata['mail'];

header("Location:profile.php?ID=".$_SESSION['ID']);
