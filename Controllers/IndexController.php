<?php
require_once "/usr/home/pluginysm/domains/janpe.ovh/views/View.php";
class IndexController {
    public function processRequest(?array $get) {
        print_r($get);
        $view = new View("testview");
    }
}
