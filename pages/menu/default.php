<?php

if(!empty($_GET['acts']== 'delete')){
    require 'delete.php';
}elseif(!empty($_GET['acts'] == 'create')){
    require 'create.php';
}elseif(!empty($_GET['acts'] == 'edit')){
    require 'edit.php';
}else{
    require 'main.php';
}