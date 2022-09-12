<?php

namespace App\View\Components;

use Illuminate\View\Component;

class sidebar_nav_item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public function __construct($route_name, $route_link, $nav_name, $icon)
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar_nav_item');
    }
}
