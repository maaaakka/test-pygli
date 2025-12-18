<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterStep1Controller;

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
    function (){
    return 'step2';
});