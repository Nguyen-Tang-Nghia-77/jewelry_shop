<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class AreaFilter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $paramsSearch = [];
    public $itemsStatusCount = [];
    public $currentFilterStatus = '';
    public function __construct($controllerName, $itemsStatusCount, $paramsSearch, $currentFilterStatus)
    {
        $this->itemsStatusCount = $itemsStatusCount;
        $this->paramsSearch = $paramsSearch;
        $this->currentFilterStatus = $currentFilterStatus;
        $this->controllerName = $controllerName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.area-filter');
    }
}
