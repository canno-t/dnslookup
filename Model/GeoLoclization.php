<?php
require_once "/usr/home/pluginysm/domains/janpe.ovh/Model/ApiCall.php";
class GeoLoclization extends ApiCall
{
    private const baseUrl = "https://ip-geolocation.whoisxmlapi.com/api/v1?apiKey=at_u2Q7qI2UcbQwbLhc2VgfXkfnVV4uT";
    private $ip;
    private $curl;
    function __construct($ip){
        $this->ip = $ip;
        $this->curl = curl_init();
    }
    public function setUp(){
        $params = [
            'ipAddress'=>$this->ip
        ];
        $this->call($this->curl, self::baseUrl, $params);
    }
    public function getLocation(){
        $response = [
          'center' => $this->response->location->lat .",".$this->response->location->lng,
            'zoom'=>"50"
        ];
        return http_build_query($response);
    }

}