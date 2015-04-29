<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Hello新生</title>
</head>
<body>
    <div class='container'>
        <div class='navbar'>
            <a href="#" class="navrwdbutton">三</a>
            <a href="/" class='navtitle'>
                Hello新生
            </a>
            <a href="logout.php" class="navitem">登出</a>
            <a href="#" class="navitem">留言</a>
            <a href="#" class="navitem">邀請</a>
            <a href="profile.php?ID=<?php echo $_SESSION['ID']; ?>" class="navitem">
                <div class='navphoto' style='background-image:url(images/userphotos/<?php
                    if($_SESSION['photo']){
                        echo $_SESSION['ID'];
                    }else{
                        echo 'defualt';
                    }
                ?>.jpg)'></div>
                <?php echo $_SESSION['fullname']; ?>
            </a>

        </div>
        <div class="fliterList">
            <a href="?fliter=school" class="fliter <?php if($_GET['fliter']=='school'){echo 'fliter-focus';}?>" id='school'>學校同學</a>
            <a href="?fliter=dept" class="fliter <?php if($_GET['fliter']=='dept'){echo 'fliter-focus';}?>" id='dept'>系上同學</a>
            <a href="?fliter=upper" class="fliter <?php if($_GET['fliter']=='upper'){echo 'fliter-focus';}?>" id='upper'>學長學姊</a>
            <a href="?fliter=under" class="fliter <?php if($_GET['fliter']=='under'){echo 'fliter-focus';}?>" id='under'>學弟學妹</a>
            <a href="?fliter=lineal" class="fliter <?php if($_GET['fliter']=='lineal'){echo 'fliter-focus';}?>" id='lineal'>直系</a>
            <a href="?fliter=search" class="fliter <?php if($_GET['fliter']=='search'){echo 'fliter-focus';}?>" id="search">搜尋</a>
        </div>
        <div class="main slashBackground">
            <?php

            include 'collate.php';
            $cud = new CollateUserData;
            foreach((array)$argument as $user){
                if(empty($user)){break;}
            ?>

                <div class='userBox'>
                    <div class='userPhoto' style='background-image:url(images/userphotos/<?php
                        if($_SESSION['photo']){
                            echo $user['ID'];
                        }else{
                            echo 'defualt';
                        }
                    ?>.jpg)'></div>

                    <div class='userName'><?=$user['fullname']?></div>
                    <div class='userGrade'><?=$cud->getGrade($user['grade'])?></div>
                    <div class='userGender'><?=$cud->getGender($user['gender'])?></div>
                </div>

            <?php
            }
            ?>
        </div>

    </div>
</body>
