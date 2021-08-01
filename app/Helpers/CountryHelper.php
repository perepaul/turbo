<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class CountryHelper
{

    private $api = array(
        'X-CSCAPI-KEY' => 'ZlY5RFMySUhMaHF6NE1RT2dzUFJIekRvM1ZUZHZxZ1o5cXlERnlSdQ== ',
    );

    private $base_url = 'https://api.countrystatecity.in/v1/';

    public $body = [];

    public function countries()
    {
        return $this->processRequest('countries');
    }

    public function country($iso = 'US')
    {
        return $this->processRequest("countries/{$iso}");
    }

    public function states($iso = 'US')
    {

        return $this->processRequest("countries/{$iso}/states");
    }

    public function state($ciso,$siso)
    {
        return $this->processRequest("countries/{$ciso}/states/{$siso}");
    }

    public function cities($ciso = 'NG', $siso = 'DE')
    {
        return $this->processRequest("countries/{$ciso}/states/{$siso}/cities");
    }

    private function processRequest($url)
    {
        $response =  Http::withHeaders($this->api)->get($this->buildUrl($url));
        $this->body = $response->body();
        return $this;
    }

    private function buildUrl($path)
    {
        return $this->base_url . $path;
    }

    public function toArray()
    {
        $bodyData = get_object_vars($this)['body'];
        return json_decode($bodyData,true);
    }
}
