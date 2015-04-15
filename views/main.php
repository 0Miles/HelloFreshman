<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <title>Hello新生</title>
</head>
<body>
    <div class='container-left'>
        <div class='navbar'>
            <a href="#" class="navrwdbutton">三</a>
            <a href="/" class='navtitle'>
                Hello新生
            </a>
            <a href="logout.php" class="navitem">登出</a>
            <a href="#" class="navitem">留言</a>
            <a href="#" class="navitem">邀請</a>
            <a href="profile.php?id=<?php echo $_SESSION['ID']; ?>" class="navitem">
                <div class='navphoto' style='background-image:url(images/userphotos/<?php echo $_SESSION['ID']; ?>.jpg)'></div>
                <?php echo $_SESSION['fullname']; ?>
            </a>

        </div>
        <div class="mainbar slashBackground">
            <a href="?fliter=school" class="button" id='school'>學校同學</a>
            <a href="?fliter=dept" class="button" id='dept'>系上同學</a>
            <a href="?fliter=upper" class="button" id='upper'>學長學姊</a>
            <a href="?fliter=under" class="button" id='under'>學弟學妹</a>
            <a href="?fliter=lineal" class="button" id='lineal'>直系</a>
        </div>
        <div class="main">

        </div>

    </div>
</body>
