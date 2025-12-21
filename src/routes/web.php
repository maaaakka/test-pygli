<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterStep1Controller;
use App\Http\Controllers\Auth\RegisterStep2Controller;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


    Route::get('/register/step1', [RegisterStep1Controller::class, 'create'])
    ->name('register.step1');

    Route::post('/register/step1', [RegisterStep1Controller::class, 'store']);

    Route::get('/register/step2', 
    [RegisterStep2Controller::class, 'create'])->name('register.step2');

    Route::post('/register/step2', [RegisterStep2Controller::class, 'store']);


    Route::middleware('auth')->group(function () {

    // 一覧
    Route::get('/weight_logs', [WeightLogController::class, 'index'])
        ->name('weight_logs.index');

    // 新規作成（＋データを追加）
    Route::get('/weight_logs/create', [WeightLogController::class, 'create'])
        ->name('weight_logs.create');

    Route::post('/weight_logs/store', [WeightLogController::class, 'store'])
        ->name('weight_logs.store');

    // 目標体重設定画面
    Route::get('/weight_logs/goal_setting', [WeightTargetController::class, 'edit'])
        ->name('weight_logs.goal_setting');

    // 目標体重更新
    Route::post('/weight_logs/goal_setting/update', [WeightTargetController::class, 'update'])
        ->name('weight_logs.goal_setting.update');

    // 詳細＋編集（✏️）
    Route::get('/weight_logs/{weightLog}', [WeightLogController::class, 'show'])
        ->name('weight_logs.show');

    // 更新
    Route::post('/weight_logs/{weightLog}/update', [WeightLogController::class, 'update'])
        ->name('weight_logs.update');

    // 削除
    Route::post('/weight_logs/{weightLog}/delete', [WeightLogController::class, 'destroy'])
        ->name('weight_logs.delete');


});