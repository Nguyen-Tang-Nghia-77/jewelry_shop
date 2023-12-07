<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class TitleContent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $controllerName;
    public $task;
    public function __construct($controllerName, $task)
    {
        $this->controllerName = $controllerName;
        $this->task = $task;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.title-content');
    }
}
