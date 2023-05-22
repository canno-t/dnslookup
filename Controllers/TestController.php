<?php
require_once "/usr/home/pluginysm/domains/janpe.ovh/views/View.php";
require_once "/usr/home/pluginysm/domains/janpe.ovh/Model/Call.php";
require_once "/usr/home/pluginysm/domains/janpe.ovh/Model/GeoLoclization.php";

class TestController
{
    public function processRequest(?array $get)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();
            if (isset($_SESSION['response']) && $_SESSION['response']['domainname'] == $_POST['domain']) {
                echo json_encode($_SESSION['response']);
            } else if ($_SESSION['token'] == $_SERVER['HTTP_MY_TOKEN']) {
                $call = new Call($_POST['domain']);
                $call->setParameters('json', 1);
                $localization = new GeoLoclization($call->getIps());
                $localization->setUp();
                $cos = $call->getAll();
                $response = [
                    'all' => $cos,
                    'domainname' => $_POST['domain'],
                    'available' => $call->isAvailable(),
                    'googlelocation' => $localization->getLocation()
                ];
                $_SESSION['response'] = $response;
                echo json_encode($response);
            }
        } else {
            $view = new View("domain");
        }
    }
}