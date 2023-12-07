<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FileController extends Controller
{
    private $pathViewController = 'admin.pages.file.';
    private $controllerName = 'file';
    private $params = [];
    private $model;

    public function __construct()
    {
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {

        return view($this->pathViewController . 'index');
    }

}
