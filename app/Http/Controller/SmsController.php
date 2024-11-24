<?php

namespace App\Http\Controller;

class SmsController
{
    private $apiBaseUrl = 'https://postback-sms.com/api';
    private $token = '';

    protected function sendGetRequest($method, $params = [])
    {
        $queryParams = http_build_query(array_merge(['action' => $method], $params));
        $url = $this->apiBaseUrl . '?' . $queryParams;
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        

        return json_decode($response, true);
    }

    public function getNumber()
    {
        $params = [
            'country' => $_GET['country'],
            'service' => $_GET['service'],
            'token' => $this->token,
        ];

        if (isset($_GET['rent_time'])) {
            $params['rent_time'] = $_GET['rent_time'];
        }
        $response = $this->sendGetRequest('getNumber', $params);
        var_dump($response);
        return $response;
    }

    public function getSms()
    {
        $params = [
            'action' => 'getSms',
            'token' => $this->token,
            'activation' =>  $_GET['activationId'],
        ];

    
            $response = $this->sendGetRequest('getSms', $params);
            var_dump($response);
            return $response;
    }

    public function cancelNumber()
    {
         $params = [
            'action' => 'cancelNumber',
            'token' => $this->token,
            'activation' => $_GET['activationId'],
        ];

        $response = $this->sendGetRequest('cancelNumber', $params);
        var_dump($response);

        return $response;
    }

    public function getStatus()
    {
        $params = [
            'action' => 'getStatus',
            'token' => $this->token,
            'activation' => $_GET['activationId'],
        ];

        $response = $this->sendGetRequest('cancelNumber', $params);
        var_dump($response);

        return $response;
    }
}