<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $button, public $color = 'primary', public $class = '')
    {
        $this->class = "transition duration-200 text-white bg-{$this->color}-600 hover:bg-{$this->color}-950 focus:ring-4 focus:ring-{$this->color}-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-{$this->color}-950 focus:outline-none dark:focus:ring-pribg-950 " . $this->class;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}