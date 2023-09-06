<?php

    if(!empty($_GET['pages']== 'read')){
        require 'read.php';
    }else{
        require 'main.php';
    }
