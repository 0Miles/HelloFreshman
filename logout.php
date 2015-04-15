<?php
session_start();
session_unset();
$_SESSION['ID'] = NULL;
$_SESSION['fullname'] = NULL;
$_SESSION['fblink'] = NULL;
$_SESSION['photo'] = NULL;
$_SESSION['gender'] = NULL;
$_SESSION['sID'] = NULL;
$_SESSION['school'] = NULL;
$_SESSION['department'] = NULL;
$_SESSION['ticketnum'] = NULL;
header("Refresh: 0; url=/");
