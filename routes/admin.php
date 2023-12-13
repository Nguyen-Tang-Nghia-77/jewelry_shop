<?php


use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

$prefixAdmin = config('zvn.url.prefix_admin');
Route::prefix($prefixAdmin)->group(function () {
    // ============================== DASHBOARD ==============================
    $prefix = 'user';
    // ->middleware('checkLogin')
    Route::prefix($prefix)->group(function () use($prefix) {
        Route::get('/', [UserController::class, 'index'])->name($prefix);
        Route::get('form/{id?}', [UserController::class, 'form'])->name($prefix.'/form');
        Route::post('save', [UserController::class, 'save'])->name($prefix.'/save');
        Route::get('change-level-{level}/{id}', [UserController::class, 'level'])->name($prefix.'/level');
        Route::get('change-status-{status}/{id}', [UserController::class, 'status'])->name($prefix.'/status');
        Route::get('delete/{id}', [UserController::class, 'delete'])->name($prefix.'/delete');
        Route::post('change-password', [UserController::class, 'changePassword'])->name($prefix.'/change-password');
        Route::post('change-level', [UserController::class, 'changeLevel'])->name($prefix.'/change-level');
    });
    $prefix = 'category';
    // ->middleware('checkLogin')
    Route::prefix($prefix)->group(function () use($prefix) {
        Route::get('/', [CategoryController::class, 'index'])->name($prefix);
        Route::get('form/{id?}', [CategoryController::class, 'form'])->name($prefix.'/form');
        Route::post('save', [CategoryController::class, 'save'])->name($prefix.'/save');
        Route::post('update-tree', [CategoryController::class, 'updateTree'])->name($prefix.'/updateTree');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name($prefix.'/delete');
        Route::get('change-status-{status}/{id}', [CategoryController::class, 'status'])->name($prefix.'/status');
        Route::get('change-is-home-{is_home}/{id}', [CategoryController::class, 'isHome'])->name($prefix.'/isHome');
        Route::get('change-display-{display}/{id}', [CategoryController::class, 'display'])->name($prefix.'/display');
        Route::post('move/{id}/{type}', [CategoryController::class, 'move'])->name($prefix.'/move');
    });
    $prefix = 'auth';
    Route::prefix($prefix)->group(function () use($prefix) {
        Route::get('/login', [AuthController::class, 'login'])->name($prefix.'/login');
        Route::post('/login', [AuthController::class, 'postLogin'])->name($prefix.'/postLogin');
        Route::post ('/logout', [AuthController::class, 'logout'])->name($prefix.'/logout');
    });
});
?>