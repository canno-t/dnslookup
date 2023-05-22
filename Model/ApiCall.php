<?php

abstract class ApiCall
{
    protected $response;
    protected function call($curl, $baseurl, $params){
        $url = $baseurl . '&' . http_build_query($params);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->response = json_decode(curl_exec($curl));
        curl_close($curl);
    }
    public function getAll(){
        return $this->response;
    }
}