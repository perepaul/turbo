<?php

namespace App\View\Components;

use App\Helpers\CountryHelper;
use Illuminate\View\Component;

class Countries extends Component
{
    public $countries;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $country = null)
    {
        $this->country = $country;
        $this->getCountries();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.countries');
    }

    public function getCountries()
    {
        $this->countries =  (new CountryHelper)->countries();
    }
}
