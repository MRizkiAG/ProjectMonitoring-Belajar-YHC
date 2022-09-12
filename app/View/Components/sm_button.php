<?php

namespace App\View\Components;

use App\Models\Project;
use Illuminate\View\Component;

class sm_button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $project = Project::findOrFail($id);
        return view('components.sm_button', compact('project'));
    }
}
