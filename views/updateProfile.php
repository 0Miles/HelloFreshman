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
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=profile' class='item item-focus'>編輯資料</a>
            <a href='profile.php?ID=<?php echo $_SESSION['ID']?>&update=photo' class='item'>更換頭貼</a>
        </div>

        <div class='profile slashBackground'>
            <form class='updateProfile container' name='updateProfile' action='update.php' method='post'>
                <p></p>
                <input type='hidden' name='id' value='<?=$_SESSION['ID']?>'>
                <label for='fullname'>姓名:</label><input type='text' name='fullname'><br>
                <label for='gender'>性別:</label>
                <select name='gender'>
                    <option value='0'>未填寫</option>
                    <option value='1'>男</option>
                    <option value='2'>女</option>
                    <option value='3'>其他</option>
                </select><br>
                <label for='school'>學校:</label>
                <select name='school'>
                    <option value=''>未填寫</option>
                    <option value='112'>國立台灣大學</option>
                    <option value='118'>國立台灣科技大學</option>
                    <option value='122'>國立台灣師範大學</option>
                </select><br>

                <label for='department'>科系:</label>
                <select name='department'>
                    <option value=''>未填寫</option>
                    <option value='mis'>資訊管理系</option>
                    <option value='im'>工業管理系</option>
                    <option value='ba'>企業管理系</option>
                    <option value='afl'>應用外語系</option>
                    <option value='me'>機械工程系</option>
                    <option value='ee'>電機工程系</option>
                    <option value='e'>電子工程系</option>
                    <option value='ce'>營建工程系</option>
                    <option value='ie'>資訊工程系</option>
                    <option value='che'>化學工程系</option>
                    <option value='a'>建築系</option>
                    <option value='cd'>商業設計系</option>
                    <option value='id'>工業設計系</option>
                    <option value='mse'>材料與工程學系</option>
                </select><br>
                <label for='grade'>年級:</label>
                <select name='grade'>
                    <option value='0'>未填寫</option>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                    <option value='6'>6</option>
                    <option value='7'>7</option>
                </select><br>
                <label for='sID'>學號:</label><input type='text' name='sID'><br>
                <label for='ticketnum'>准考證號:</label><input type='text' name='ticketnum'><br><br>
                <br>
                <label class='labimg' for='fblink'><img src='images/contact/facebook.png'></label><input type='text' name='fblink'><br>
                <label class='labimg' for='googleplus'><img src='images/contact/googleplus.png'></label><input type='text' name='googleplus'><br>
                <label class='labimg' for='twitter'><img src='images/contact/twitter.png'></label><input type='text' name='twitter'><br>
                <label class='labimg' for='plurk'><img src='images/contact/plurk.png'></label><input type='text' name='plurk'><br>
                <label class='labimg' for='github'><img src='images/contact/github.png'></label><input type='text' name='github'><br>
                <label class='labimg' for='linkedin'><img src='images/contact/linkedin.png'></label><input type='text' name='linkedin'><br>
                <label class='labimg' for='weibo'><img src='images/contact/weibo.png'></label><input type='text' name='weibo'><br>
                <label class='labimg' for='line'><img src='images/contact/line.png'></label><input type='text' name='line'><br>
                <label class='labimg' for='wechat'><img src='images/contact/wechat.png'></label><input type='text' name='wechat'><br>
                <label class='labimg' for='mail'><img src='images/contact/mail.png'></label><input type='text' name='mail'><br>
                <button type='submit'>修改資料</button>
                <br>
                <br>
            </form>
            <script>
                document.updateProfile.fullname.value = '<?=$_SESSION['fullname']?>';
                document.updateProfile.gender.value = '<?=$_SESSION['gender']?>';
                document.updateProfile.school.value = '<?=$_SESSION['school']?>';
                document.updateProfile.department.value = '<?=$_SESSION['department']?>';
                document.updateProfile.grade.value = '<?=$_SESSION['grade']?>';
                document.updateProfile.sID.value = '<?=$_SESSION['sID']?>';
                document.updateProfile.ticketnum.value = '<?=$_SESSION['ticketnum']?>';
                document.updateProfile.fblink.value = '<?=$_SESSION['fblink']?>';
                document.updateProfile.googleplus.value = '<?=$_SESSION['googleplus']?>';
                document.updateProfile.twitter.value = '<?=$_SESSION['twitter']?>';
                document.updateProfile.plurk.value = '<?=$_SESSION['plurk']?>';
                document.updateProfile.github.value = '<?=$_SESSION['github']?>';
                document.updateProfile.linkedin.value = '<?=$_SESSION['linkedin']?>';
                document.updateProfile.weibo.value = '<?=$_SESSION['weibo']?>';
                document.updateProfile.line.value = '<?=$_SESSION['line']?>';
                document.updateProfile.wechat.value = '<?=$_SESSION['wechat']?>';
                document.updateProfile.mail.value = '<?=$_SESSION['mail']?>';
            </script>
        </div>



    </div>
</body>
</html>
