<?php
include 'config/dbconfig.php';

class UserCtrl{

    private $db;
    public $_dns;
    public $_user;
    public $_pwd;

    function DBconnect(){
        try{
            $this->db = new PDO($this->_dsn,$this->_user,$this->_pwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';"));
        }catch(Exception $error){
            die("Connection failed: " . $error->getMessage());
        }
    }

    function checkUserExist($id){
        $this->DBconnect();
        $result = $this->db->query("SELECT * FROM `userlist` WHERE `ID`='$id'")->fetch();
        $this->db = NULL;
        if(empty($result)){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    function newFBuser($fbid,$fblink,$name,$gender,$photo){
        $this->DBconnect();
        switch ($gender)
        {
        case 'male':
            $genderNum=1;
            break;
        case 'female':
            $genderNum=2;
            break;
        default:
            $genderNum=3;
        }
        $this->db->exec("INSERT INTO `userlist` (`ID`,`FBlink`,`fullname`,`gender`,`photo`) VALUES ('$fbid','$fblink','$name','$genderNum','$photo')");
        $this->db = NULL;
    }

    function saveUserPhoto($id,$photo){
        $photo_w = imagesx($photo);
        $photo_h = imagesy($photo);

        if($photo_w > 250 or $photo_h > 250){
            if($photo_w > $photo_h){
              $thumb_w = 250;
              $thumb_h = intval($photo_h / $photo_w * 250);
            }else{
              $thumb_h = 250;
              $thumb_w = intval($photo_w / $photo_h * 250);
            }
        }else{
            $thumb_w = $photo_w;
            $thumb_h = $photo_h;
        }

        $thumb = imagecreatetruecolor($thumb_w, $thumb_h);

        imagecopyresampled($thumb, $photo, 0, 0, 0, 0, $thumb_w, $thumb_h, $photo_w, $photo_h);
        imagejpeg($thumb, "images/userphotos/" . $id . '.jpg');
    }

    function selectUserList($query){
        $this->DBconnect();
        $result = $this->db->query("SELECT * FROM `userlist` WHERE " . $query)->fetchAll();
        $this->db = NULL;
        if(empty($result)){
            return FALSE;
        }else{
            return $result;
        }
    }

    function getAllUserData($id){
        $this->DBconnect();
        $result = $this->db->query("SELECT * FROM `userlist` WHERE `ID`='$id'")->fetch();
        $this->db = NULL;
        if(empty($result)){
            return FALSE;
        }else{
            return $result;
        }
    }

    function getUserName($id){
        $this->DBconnect();
        $result = $this->db->query("SELECT `fullname` FROM `userlist` WHERE `ID`='$id'")->fetch();
        $this->db = NULL;
        if(empty($result)){
            return FALSE;
        }else{
            return $result['fullname'];
        }
    }

    function updateUserData($id,$fblink,$fullname,$gender,$sID,$school,$department,$grade,$ticketnum,$googleplus,$twitter,$plurk,$line,$github,$linkedin,$weibo,$wechat,$mail){
        $this->DBconnect();
        $this->db->exec("UPDATE `userlist` SET `FBlink`='$fblink',`fullname`='$fullname',`gender`='$gender',`sID`='$sID',`school`='$school', `department`='$department',`grade`='$grade',`ticketnum`='$ticketnum',`googleplus`='$googleplus',`twitter`='$twitter',`plurk`='$plurk',`line`='$line',`github`='$github',`linkedin`='$linkedin',`weibo`='$weibo',`wechat`='$wechat',`mail`='$mail' WHERE `ID`='$id'");
        $this->db = NULL;
    }
}

$uc = new UserCtrl;
$uc->_dsn = $dsn;
$uc->_user = $user;
$uc->_pwd = $pwd;
