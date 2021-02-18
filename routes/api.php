<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersAdmController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TasksAdmController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterAdmController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('adm/register', [RegisterAdmController::class, 'register']);
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);


Route::group(['middleware' => ['auth:api']], function () {
    Route::get('test-auth', function () {
        dd(Auth::user()->id);
    });
});

Route::group(['middleware' => ['auth:api', 'for_admin'], 'prefix' => 'adm'], function () {
    Route::resource('tasks', TasksAdmController::class);
    Route::resource('users', UsersAdmController::class);
});

Route::group(['middleware' => ['auth:api', 'for_user']], function () {
    Route::resource('tasks', TasksController::class);
});




