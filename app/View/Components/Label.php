<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Label extends Component
{
    /**
     * Create a new component instance.
     */
    public $for;
    public $value;

    public function __construct($for, $value)
    {
        $this->for = $for;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.label');
    }
}
