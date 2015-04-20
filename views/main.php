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
            <a href="?fliter=school" class="fliter fliter-focus" id='school'>學校同學</a>
            <a href="?fliter=dept" class="fliter" id='dept'>系上同學</a>
            <a href="?fliter=upper" class="fliter" id='upper'>學長學姊</a>
            <a href="?fliter=under" class="fliter" id='under'>學弟學妹</a>
            <a href="?fliter=lineal" class="fliter" id='lineal'>直系</a>
            <a href="#" class="fliter" id="search">搜尋</a>
        </div>
        <div class="main slashBackground">

        </div>

    </div>
</body>
