<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category as MainModel;
use App\Http\Requests\CategoryRequest as MainRequest;

class CategoryController extends Controller
{
    private $pathViewController = 'admin.pages.category.';
    private $controllerName     = 'category';
    private $params             = [];
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerPage"] = 10;
        view()->share('controllerName', $this->controllerName);
    }

    public function updateTree(Request $request) {
        $data = $request->data;
        dd($data);
        $root = MainModel::find(1);
        MainModel::rebuildSubtree($data, $root);
        return response()->json($data);
    }
    public function index(Request $request)
    {
        $this->params['filter']['status'] = $request->input('filter_status', 'all');
        $this->params['search']['field']  = $request->input('search_field', ''); 
        $this->params['search']['value']  = $request->input('search_value', '');

        // $items              = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $items              = MainModel::withDepth()->having('depth', '>', 0)->defaultOrder()->get()->toTree();
        $itemsStatusCount   = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']);
        return view($this->pathViewController .  'index', [
            'params'        => $this->params,
            'items'         => $items,
            'itemsStatusCount' =>  $itemsStatusCount
        ]);
    }

    public function form(Request $request)
    {
        $item = null;
        $categories = MainModel::withDepth()->defaultOrder();
        if ($request->id !== null) {
            $params["id"] = $request->id;
            $item = $this->model->getItem($params, ['task' => 'get-item']);
            $categories = $categories->where('_lft','<' ,$item['_lft'])->orWhere('_lft', '>', $item['_rgt']);
        }
        $categories = $categories->get()->toFlatTree()->pluck('name_with_depth', 'id');
        return view($this->pathViewController .  'form', [
            'item'          => $item,
            'categories'    => $categories
        ]);
    }

    public function save(MainRequest $request)
    {

        if ($request->method() == 'POST') {
            $params = $request->all();


            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if ($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

    public function status(Request $request)
    {
        $params["currentStatus"]  = $request->status;
        $params["id"]             = $request->id;
        $this->model->saveItem($params, ['task' => 'change-status']);
        $status = $request->status == 'active' ? 'inactive' : 'active';
        $link = route($this->controllerName . '/status', ['status' => $status, 'id' => $request->id]);
        return response()->json([
            'statusObj' => config('zvn.template.status')[$status],
            'link' => $link,
        ]);
    }

    public function isHome(Request $request)
    {
        $params["currentIsHome"]  = $request->is_home;
        $params["id"]             = $request->id;
        $this->model->saveItem($params, ['task' => 'change-is-home']);
        $isHomeValue = $request->is_home == 'yes' ? 'no' : 'yes';
        $link = route($this->controllerName . '/isHome', ['is_home' => $isHomeValue, 'id' => $request->id]);
        return response()->json([
            'isHomeObj' => config('zvn.template.is_home')[$isHomeValue],
            'link' => $link,
        ]);
    }


    public function delete(Request $request)
    {
        $params["id"]             = $request->id;
        $this->model->deleteItem($params, ['task' => 'delete-item']);
        return redirect()->route($this->controllerName)->with('zvn_notify', 'Xóa phần tử thành công!');
    }
    public function move(Request $request)
    {
        $id             = $request->id;
        $type             = $request->type;
        $node = MainModel::find($id);
        if($type == 'up') {
            $node->up();
        }
        else {
            $node->down();
        }
        return redirect()->back()->with('zvn_notify', 'Di chuyển category thành công!');
    }
}
