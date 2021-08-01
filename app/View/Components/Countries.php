<?php

namespace App\View\Components;

use App\Helpers\CountryHelper;
use Illuminate\View\Component;

class Countries extends Component
{
    public $country,$countries;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($country = null)
    {
        $this->country = $country;
        $this->getCountries();
        // dd($this->countries);
    }

    public function getCountries()
    {
        $helper = new CountryHelper();
        $this->countries = $helper->countries()->toArray();
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
}
