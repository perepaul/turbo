<?php

namespace App\View\Components;

use App\Helpers\CountryHelper;
use Illuminate\View\Component;

class States extends Component
{
    public $states;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $country = null, public $selected = null)
    {
        $this->getStates();
    }

    public function getStates()
    {
        $this->states = !is_null($this->country)
            ?   (new CountryHelper)->states($this->country)
            : [];
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
