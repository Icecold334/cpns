<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $title, public $href)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.side-item');
    }
}
