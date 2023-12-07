<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Session\SessionManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Http\Requests\ChangePasswordRequest as MainRequest;
use App\Rules\ChangePassword;
class ChangePasswordController extends Controller
{
    private $pathViewController = 'admin.pages.change_password.';
    private $controllerName     = 'changePassword';
    private $params             = [];
    private $model;

    public function __construct()
    {
        $this->params["pagination"]["totalItemsPerPage"] = 5;
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        return view($this->pathViewController .  'index', [
            'params'        => $this->params
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            $notify = '';
            if(session()->has('userInfo')) {
                $userModel  = new UserModel();
                $notify = "Thay đổi mật khẩu thành công!";
                $userInfo = session('userInfo');
                $params['id'] = $userInfo['id'];
                $userModel->saveItem($params, ['task' => 'change-password']);
            }
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }

}
