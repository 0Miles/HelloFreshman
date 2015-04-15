<?php
session_start();
require_once '{Facebook PHP SDK autoload}';
use Facebook\FacebookSession;
FacebookSession::setDefaultApplication('{appID}','{appSecret}');
