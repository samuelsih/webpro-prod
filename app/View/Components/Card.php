<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $linkto;
    public $name;
    public $amount;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($linkto, $name, $amount)
    {
        $this->linkto = $linkto;
        $this->amount = $amount;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
