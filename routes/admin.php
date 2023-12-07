<?php
use Illuminate\Support\Facades\Route;

$prefixAdmin = config('zvn.url.prefix_admin');

Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin', 'middleware' => ['permission.admin']], function () {
    // ============================== DASHBOARD ==============================
    $prefix = 'dashboard';
    $controllerName = 'dashboard';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
    });

    // ============================== SLIDER ==============================
    $prefix = 'slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::get('form/{id?}', ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save', 'uses' => $controller . 'save']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete', 'uses' => $controller . 'delete']);
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status', 'uses' => $controller . 'status'])->where('id', '[0-9]+');
    });

    // ============================== CATEGORY ==============================
    $prefix = 'category';
    $controllerName = 'category';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::get('form/{id?}', ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save', 'uses' => $controller . 'save']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status', 'uses' => $controller . 'status'])->where('id', '[0-9]+');
        Route::get('change-is-home-{is_home}/{id}', ['as' => $controllerName . '/isHome', 'uses' => $controller . 'isHome'])->where('id', '[0-9]+');
        Route::get('change-display-{display}/{id}', ['as' => $controllerName . '/display', 'uses' => $controller . 'display']);
        Route::get('move/{id}/{type}', ['as' => $controllerName . '/move', 'uses' => $controller . 'move']);
    });

    // ============================== PRODUCT ==============================
    $prefix = 'product';
    $controllerName = 'product';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::get('form/{id?}', ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save', 'uses' => $controller . 'save']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status', 'uses' => $controller . 'status']);
        Route::get('change-type-{type}/{id}', ['as' => $controllerName . '/type', 'uses' => $controller . 'type']);
        Route::get('change-category-{category_id}/{id}', ['as' => $controllerName . '/changeCategory', 'uses' => $controller . 'changeCategory']);
    });

    // ============================== USER ==============================
    $prefix = 'user';
    $controllerName = 'user';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::get('form/{id?}', ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save', 'uses' => $controller . 'save']);
        Route::post('change-password', ['as' => $controllerName . '/change-password', 'uses' => $controller . 'changePassword']);
        Route::post('change-level', ['as' => $controllerName . '/change-level', 'uses' => $controller . 'changeLevel']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status', 'uses' => $controller . 'status']);
        Route::get('change-level-{level}/{id}', ['as' => $controllerName . '/level', 'uses' => $controller . 'level']);
    });

    // ============================== MENU ==============================
    $prefix = 'menu';
    $controllerName = 'menu';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::get('form/{id?}', ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save', 'uses' => $controller . 'save']);
        Route::get('delete/{id}', ['as' => $controllerName . '/delete', 'uses' => $controller . 'delete'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', ['as' => $controllerName . '/status', 'uses' => $controller . 'status']);
        // Route::get('change-type-{type}/{id}',         [ 'as' => $controllerName . '/type',      'uses' => $controller . 'type']);
    });
    // ============================== CHANGE PASSWORD ==============================
    $prefix = 'change-password';
    $controllerName = 'changePassword';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';
        Route::get('/', ['as' => $controllerName, 'uses' => $controller . 'index']);
        Route::post('change-password', ['as' => $controllerName . '/change-password', 'uses' => $controller . 'changePassword']);
        Route::get('form/{id?}', ['as' => $controllerName . '/form', 'uses' => $controller . 'form'])->where('id', '[0-9]+');
        Route::post('save', ['as' => $controllerName . '/save', 'uses' => $controller . 'save']);
    });
});
?>