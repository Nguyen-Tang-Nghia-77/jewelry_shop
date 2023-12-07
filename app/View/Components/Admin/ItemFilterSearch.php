<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class ItemFilterSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $searchField = '';
    public $searchValue = '';
    public $fieldInController = [];
    public $tmplField = [];

    public $xhtmlField = '';

    public function __construct($controllerName, $paramsSearch)
    {
        $xhtmlField = '';
        $tmplField = Config("zvn.template.search");
        $fieldInController = Config("zvn.config.search");
        $controllerName = array_key_exists($controllerName, $fieldInController) ? $controllerName : "default";


        foreach ($fieldInController[$controllerName] as $key => $field) {
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>', $field, $tmplField[$field]['name']);
        }
        $searchField = (in_array($paramsSearch['field'],$fieldInController[$controllerName]) ? $paramsSearch['field'] : "all");

        $this->searchField = $searchField;
        $this->tmplField = $tmplField;
        $this->fieldInController = $fieldInController[$controllerName];
        $this->xhtmlField = $xhtmlField;
        $this->searchValue = $paramsSearch['value'] ?? '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.item-filter-search');
    }
}
