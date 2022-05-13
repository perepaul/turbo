<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class CountryHelper
{
    private $country_file = 'countries.json';
    protected $countries;

    public function __construct()
    {
        $this->countries = $this->parseContries();
    }

    public function countries()
    {
        $countries = [];
        foreach ($this->countries as $country) {
            array_push($countries, $country['name']);
        }
        return $countries;
    }

    public function states($selected)
    {
        $states = [];
        foreach ($this->countries as $country) {
            if ($country['name'] == $selected) {
                foreach ($country['states'] as $state) {
                    array_push($states, $state['name']);
                }
            }
        }
        return $states;
    }

    private function parseContries()
    {
        $contents = file_get_contents(public_path($this->country_file));
        return json_decode($contents, true);
    }
}
