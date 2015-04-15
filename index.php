<?php
include 'view.php';
session_start();

$view = new Views;

if(empty($_SESSION['ID'])){
    $view->load('index','');
}else{
    $view->load('main','');
}
