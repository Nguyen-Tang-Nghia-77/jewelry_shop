<?php

namespace App\View\Components\Admin;
use Config;
use Illuminate\View\Component;

class ItemIsHome extends Component
{
    public $url = '';
    public $className = '';
    public $name= '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isHomeValue, $id, $controllerName, $isHomeTemplate)
    {
        $this->url          = route($controllerName . '/isHome', ['is_home' => $isHomeValue, 'id' => $id]);
        $this->className = $isHomeTemplate['class'];
        $this->name = $isHomeTemplate['name'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.item-is-home');
    }
}
