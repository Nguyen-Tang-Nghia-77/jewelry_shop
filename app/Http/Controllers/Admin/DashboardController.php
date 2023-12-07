<?php

namespace App\Http\Controllers\Admin;
use App\Models\DashboardModel as MainModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $pathViewController = 'admin.pages.dashboard.';  // slider
    private $controllerName     = 'dashboard';

    public function __construct()
    {
        $this->model = new MainModel();
        view()->share('controllerName', $this->controllerName);
    }

    public function index()
    {
        // $paramsSource = ['db' => 'proj_news', 'table' => 'article'];
        // $paramsDes = ['db' => 'project_news', 'table' => 'articles'];
        // $dataSource = $this->model->moveData($paramsSource,$paramsDes);
        // if($dataSource) echo 'Insert thành công';
        // die('Function die is called!');
        $items = $this->model->listItems();
        return view($this->pathViewController .  'index', ['items' => $items]);
    }
}
