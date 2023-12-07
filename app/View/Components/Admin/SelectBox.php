<?php

namespace App\View\Components\Admin;
use Config;
use Illuminate\View\Component;

class SelectBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tmplSelectOption = [];
    public $url = '';
    public $currentValue = '';
    public function __construct($controllerName, $id, $currentValue, $fieldName)
    {
        $this->url = route($controllerName . '/' . $fieldName, [$fieldName => 'value_new', 'id' => $id]);
        $this->tmplSelectOption = Config::get('zvn.template.' . $fieldName);
        $this->currentValue = $currentValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.select-box');
    }
}
