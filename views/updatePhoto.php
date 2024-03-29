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
            <a href='profile.php?ID=<?php echo $argument['ID']?>' class='item'>聯絡資訊</a>
            <a href='#' class='item'>留言</a>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=profile' class='item'>編輯資料</a>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=photo' class='item item-focus'>更換頭貼</a>
        </div>
        <div class='profile slashBackground'>
            <form method="post" enctype="multipart/form-data">
            	<input type='file' id="imginput">
            </form>
        </div>



    </div>

    <script src="js/jquery-1.11.0.js"></script>
    <script>
    $(document).ready(function(){
    	$('#imginput').change(function(){
    		readURL(this);
    	});
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
               	$('.photo').css('background-image', 'url(' + e.target.result + ')');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>
</html>
