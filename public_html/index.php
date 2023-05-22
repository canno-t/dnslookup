<?php
    //echo($_REQUEST["q"]);
//define('APP_DIR', __DIR__.'/../');


//spl_autoload_register(function ($class_name){
//        if(file_exists("../Routing/".$class_name.".php")){
//            include_once "../Routing/".$class_name.".php";
//        }
//        else if(file_exists("../views/".$class_name.".php")){
//            include_once "../views/".$class_name.".php";
//        }
//    });
//    include_once "../routing.php";
    if(empty($_REQUEST)){
        $_REQUEST["q"] = "";
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once '../routing.php';
    Routing::run($_REQUEST["q"]);