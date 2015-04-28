<?php
include 'config/fbconfig.php';
include 'dbctrl.php';

use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

function getcontents($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $contents = curl_exec($ch);
    curl_close($ch);
    return $contents;
}

$helper = new FacebookRedirectLoginHelper('http://localhost/fblogin.php');
try{
    $session = $helper->getSessionFromRedirect();
}catch(FacebookRequestException $ex){
    // When Facebook returns an error
}catch(Exception $ex){
    // When validation fails or other local issues
}

if(isset($session)){
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();

    $graphObject = $response->getGraphObject();
    $fbid = $graphObject->getProperty('id');
    $fbfullname = $graphObject->getProperty('name');
    $fblink = $graphObject->getProperty('link');
    $fbgender = $graphObject->getProperty('gender');

    $request = new FacebookRequest($session,'GET','/me/picture',array ('redirect' => false,'type' => 'large'));
    $response = $request->execute();
    $graphObject = $response->getGraphObject();
    $photourl = $graphObject->getProperty('url');
    $fbphoto = imagecreatefromstring(getcontents($photourl));

    if(!($uc->checkUserExist($fbid))){
        $uc->newFBuser($fbid,$fblink,$fbfullname,$fbgender,1);
        $uc->saveUserPhoto($fbid,$fbphoto);
    }

    $userdata = $uc->getAllUserData($fbid);

    $_SESSION['ID'] = $fbid;
    $_SESSION['fullname'] = $userdata['fullname'];
    $_SESSION['fblink'] = $userdata['FBlink'];
    $_SESSION['photo'] = $userdata['photo'];
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


    header("Refresh: 0; url=/");
} else {
    $loginUrl = $helper->getLoginUrl();
    header("Location:".$loginUrl);
}
