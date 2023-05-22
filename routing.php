<?php
//    $newroute = new Route();
//    $newroute->get("ll", function (){
//    print_r($_GET);
//    });
//    $newroute->get("about", function (){
//    $view = new View();
//    $view->ret("testview");
//

class Routing {
    public static function run(string $route) {
        $full = explode("/", $route);
        $controller = "";

        if($route == "")
            $controller = "IndexController";
        else {
            $route = $full[0];
            $controller = ucfirst($route)."Controller";
        }

        if(file_exists("../Controllers/{$controller}.php")) {
            require_once ("../Controllers/{$controller}.php");
            $ControllerInstance = new $controller();

            $ControllerInstance->processRequest($full);
        }
        else
            echo("404");
            //http_response_code(404);
    }
}