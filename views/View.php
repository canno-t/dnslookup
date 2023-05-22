<?php
//CHANGE ROOT DIR
class View
{
    function __construct($viewname){
        if(file_exists("/usr/home/pluginysm/domains/janpe.ovh/views/".$viewname.".php")){
            require_once "/usr/home/pluginysm/domains/janpe.ovh/views/".$viewname.".php";
        }
        else{
            echo("views/".$viewname.".php");
        }
    }
}