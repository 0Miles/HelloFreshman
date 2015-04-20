<!DOCTYPE html>
<html lang="zh-tw">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <title><?php echo $argument['fullname'];?></title>
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

        <?php
        include 'collate.php';
        $cud = new CollateUserData;
        ?>

        <div class='leftside'>
            <div class='photo' style='background-image:url(images/userphotos/<?php
                if($argument['photo']){
                    echo $argument['ID'];
                }else{
                    echo 'defualt';
                }
            ?>.jpg)'></div>
            <h1 class='fullname'><?php echo $argument['fullname'];?></h1>
            <h2 class='subtitle'>
                <?php
                echo $cud->getDepartment($argument['department']).' - '.$cud->getGrade($argument['grade']);
                ?>

            </h2>
            <a href='profile.php?ID=<?php echo $argument['ID']?>' class='item item-focus'>個人資料</a>
            <a href='#' class='item'>留言</a>
            <?php if($_SESSION['ID']==$argument['ID']){?>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=profile' class='item'>編輯資料</a>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=photo' class='item'>更換頭貼</a>
            <?php }?>
        </div>
        <div class='profile slashBackground'>

        </div>



    </div>
</body>
</html>
