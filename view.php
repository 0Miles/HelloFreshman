<?php
class Views{
    function load($filename, $data){
        include('views/'.$filename.'.php');
    }

}
