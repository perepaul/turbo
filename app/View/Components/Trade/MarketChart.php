<?php

namespace App\View\Components\Trade;

use Illuminate\View\Component;

class MarketChart extends Component
{
    public $width, $height;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($width=null,$height = null)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.trade.market-chart');
    }
}
