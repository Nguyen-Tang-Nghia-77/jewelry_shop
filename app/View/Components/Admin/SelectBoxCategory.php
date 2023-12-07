<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Config;
class SelectBoxCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tmplSelectOption = [];
    public $url = '';
    public $currentValue = '';
    public function __construct($controllerName, $id, $currentValue, $templateCategory)
    {
        $this->url = route($controllerName . '/changeCategory', ['category_id' => 'value_new', 'id' => $id]);
        $this->tmplSelectOption = $templateCategory;
        $this->currentValue = $currentValue;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.select-box-category');
    }
}
