<?php
require_once "/usr/home/pluginysm/domains/janpe.ovh/Model/ApiCall.php";
class Call extends ApiCall
{
    private const baseUrl = "https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=at_u2Q7qI2UcbQwbLhc2VgfXkfnVV4uT";
    protected $domainname;
    protected $curl;
    function __construct($domainname){
        $this->domainname = $domainname;
        $this->curl = curl_init();
    }
    public function setParameters(string $format = "json",int $ip = 0, int $da=1){
        $optional = [
            "domainName"=>$this->domainname,
            "outputFormat"=>$format,
            "ip"=>$ip,
            "da"=>$da
        ];
        $this->call($this->curl, self::baseUrl, $optional);
    }
    public function isAvailable(){
        return $this->response->WhoisRecord->domainAvailability;
    }
    public function getIps(){
        return $this->response->WhoisRecord->ips[0];
    }
}