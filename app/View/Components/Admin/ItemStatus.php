<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use Config;
class ItemStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $url = '';
    public $className = '';
    public $name= '';
    

    public function __construct($statusValue, $id, $controllerName, $statusTemplate)
    {
        $this->url          = route($controllerName . '/status', ['status' => $statusValue, 'id' => $id]);
        $this->className = $statusTemplate['class'];
        $this->name = $statusTemplate['name'];
    }
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.item-status');
    }
}
