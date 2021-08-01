<?php

namespace App\View\Components;

use App\Helpers\CountryHelper;
use Illuminate\View\Component;

class States extends Component
{
    public $country_id, $states;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->country_id = $id;
        $this->getStates();
    }

    public function getStates()
    {
        $helper = new CountryHelper();
        $this->states = $helper->states($this->country_id)->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.states');
    }
}
