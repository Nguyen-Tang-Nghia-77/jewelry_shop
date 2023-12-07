<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Config;
class ItemFilterStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $paramsSearch = [];
    public $tmplStatus = [];
    public $itemsStatusCount = [];
    public $controllerName = '';
    public $currentFilterStatus = '';

    public function __construct($controllerName,$itemsStatusCount, $paramsSearch, $currentFilterStatus)
    {
        $tmplStatus = Config::get('zvn.template.status');

        if (count($itemsStatusCount) > 0) {
            array_unshift($itemsStatusCount , [
                'count'   => array_sum(array_column($itemsStatusCount, 'count')),
                'status'  => 'all'
            ]);
            $this->itemsStatusCount = $itemsStatusCount;
        }
        $this->paramsSearch = $paramsSearch;
        $this->currentFilterStatus = $currentFilterStatus;
        $this->tmplStatus = $tmplStatus;
        $this->controllerName = $controllerName;
        $this->currentFilterStatus = $currentFilterStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.item-filter-status');
    }
}
