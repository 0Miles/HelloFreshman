<?php
class Views{
    function load($filename, $argument){
        include('views/'.$filename.'.php');
    }

}
