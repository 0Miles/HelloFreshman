<?php
class CollateUserData{
    function getSchool($args){
        if(empty($args)){
            return '尚未填寫學校';
        }else{
            switch ($args)
            {
            case '112':
                return '台灣大學';
                break;
            case '118':
                return '台灣科技大學';
                break;
            case '122':
                return '台灣師範大學';
                break;
            default:
                return '未知的學校';
            }
        }
    }

    function getDepartment($args){
        if(empty($args)){
            return '尚未填寫系所';
        }else{
            switch ($args)
            {
            case 'mis':
                return '資訊管理系';
                break;

            case 'im':
                return '工業管理系';
                break;

            case 'ba':
                return '企業管理系';
                break;

            case 'afl':
                return '應用外語系';
                break;

            case 'me':
                return '機械工程系';
                break;

            case 'ee':
                return '電機工程系';
                break;

            case 'e':
                return '電子工程系';
                break;

            case 'ce':
                return '營建工程系';
                break;

            case 'ie':
                return '資訊工程系';
                break;

            case 'che':
                return '化學工程系';
                break;

            case 'a':
                return '建築系';
                break;

            case 'cd':
                return '商業設計系';
                break;

            case 'id':
                return '工業設計系';
                break;

            case 'mse':
                return '材料與工程學系';
                break;

            default:
                return '未知的科系';
            }
        }
    }

    function getGender($args){
        if(empty($args)){
            return '尚未填寫性別';
        }else{
            switch ($args)
            {
            case '1':
                return '男同學';
                break;
            case '2':
                return '女同學';
                break;
            default:
                return '其他性別的同學';
            }
        }
    }

    function getGrade($args){
        if(empty($args)){
            return '尚未填寫年級';
        }else{
            switch ($args)
            {
            case '1':
                return '一年級';
                break;
            case '2':
                return '二年級';
                break;
            case '3':
                return '三年級';
                break;
            case '4':
                return '四年級';
                break;
            case '5':
                return '五年級';
                break;
            case '6':
                return '六年級';
                break;
            case '7':
                return '七年級';
                break;
            default:
                return '其他年級';
            }
        }
    }
}
