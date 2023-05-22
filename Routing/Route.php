<?php

class Route
{
    public function get($path, $fun){
            if($_GET['q']=="public_html/".$path){
                $fun->__invoke();
            }
            else{
                return http_response_code(404);
            }
    }
    public function post($path, $fun){
        if($_POST['q']=="public_html/".$path) $fun->__invoke();
        else{
            return http_response_code(400);
        }
    }
}