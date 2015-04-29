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
            <a href="#" class="navitem">通知</a>
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
                <?=$cud->getSchool($argument['school']).' - '.$cud->getDepartment($argument['department'])?>
            </h2>
            <ul class='subtitle'>
                <li><?=$cud->getGrade($argument['grade'])?></li>
                <li><?=$cud->getGender($argument['gender'])?></li>
                <li><?=$cud->getsID($argument['sID'])?></li>
                <li><?=$cud->getTicketnum($argument['ticketnum'])?></li>
            </ul>

            <p></p>
            <a href='profile.php?ID=<?php echo $argument['ID']?>' class='item item-focus'>聯絡資訊</a>
            <a href='#' class='item'>留言</a>
            <?php if($_SESSION['ID']==$argument['ID']){?>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=profile' class='item'>編輯資料</a>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=photo' class='item'>更換頭貼</a>
            <?php }?>
        </div>
        <div class='profile slashBackground'>
            <div class='profileblock container'>

                <ul>
                    <?php if(empty($argument['FBlink'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/facebook.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['FBlink']?>'><img src='images/contact/facebook.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['googleplus'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/googleplus.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['googleplus']?>'><img src='images/contact/googleplus.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['twitter'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/twitter.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['twitter']?>'><img src='images/contact/twitter.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['plurk'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/plurk.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['plurk']?>'><img src='images/contact/plurk.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['github'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/github.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['github']?>'><img src='images/contact/github.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['linkedin'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/linkedin.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['linkedin']?>'><img src='images/contact/linkedin.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['weibo'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/weibo.png'></a>
                    <?php }else{ ?>
                        <a href='<?=$argument['weibo']?>'><img src='images/contact/weibo.png'></a>
                    <?php } ?>


                    <?php if(empty($argument['line'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/line.png'></a>
                    <?php }else{ ?>
                        <a href='#' id='linebox' class='dialogOpen'><img src='images/contact/line.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['wechat'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/wechat.png'></a>
                    <?php }else{ ?>
                        <a href='#' id='wechatbox' class='dialogOpen'><img src='images/contact/wechat.png'></a>
                    <?php } ?>

                    <?php if(empty($argument['mail'])){ ?>
                        <a href='#' class='notext'><img src='images/contact/mail.png'></a>
                    <?php }else{ ?>
                        <a href='#' id='mailbox' class='dialogOpen'><img src='images/contact/mail.png'></a>
                    <?php } ?>

                </ul>
            </div>
        </div>



    </div>
    <div id='dialogTable'>
        <div id="dialogContainer">
    		<div class="dialog">
    			<div id="dialogClose"></div>
    			<p class="dialogText" id="line"><?=$argument['line']?></p>
                <p class="dialogText" id="wechat"><?=$argument['wechat']?></p>
                <p class="dialogText" id="mail"><?=$argument['mail']?></p>
    		</div>
    	</div>
    </div>

    <script src="js/jquery-1.11.0.js"></script>
    <script>
    $(function() {

        $('.dialogOpen').click(function(){
            $('#dialogTable').css('display','table');
            $('#dialogContainer').css('display','table-cell');
            $('.dialog').css('display','inline-block');
        });

        $('#linebox').click(function(){
            $('#line').css('display','inline');
        });

        $('#wechatbox').click(function(){
            $('#wechat').css('display','inline');
        });

        $('#mailbox').click(function(){
            $('#mail').css('display','inline');
        });

        $('#dialogClose').click(function(){
            $('#dialogTable').css('display','none');
            $('#dialogContainer').css('display','none');
            $('.dialog').css('display','none');
            $('#line').css('display','none');
            $('#wechat').css('display','none');
            $('#mail').css('display','none');
        });

    });
    </script>
</body>
</html>
