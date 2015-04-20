<?php
session_start();
include 'dbctrl.php';
include 'view.php';

$view = new Views;

if(empty($_SESSION['ID'])){
    $view->load('index','');
}else{
    $view->load('main','');
}
