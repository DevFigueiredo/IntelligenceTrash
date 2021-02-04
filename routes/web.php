<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\TrashCapacityController;
use App\Http\Controllers\TrashRegionsController;
use App\Http\Controllers\TrashOrganizationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrashTeamUsersController;
use App\Http\Controllers\TrashHistoryController;
use App\Http\Controllers\TrashResponsability;
use App\Http\Controllers\IndexController;




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
Route::post('/login',[UserController::class, 'Login']);
Route::get('/logout',[UserController::class, 'Logout']);


Route::get('/',[IndexController::class, 'index']);
Route::get('/negado',function(){return 'Acesso Negado';})->name('negado');


Route::get('/dashboard',[DashboardController::class, 'index']);



Route::get('/trasheslist', [TrashController::class, 'indexTrashList']);
Route::get('/trash/index', [TrashController::class, 'indexTrashView']);
Route::get('/trash', [TrashController::class, 'index']);
Route::get('/trash/info/{id}',[TrashController::class,'show']);
Route::get('/trash/info/{id}/index',[TrashController::class,'indexView']);
Route::post('/trash/create', [TrashController::class, 'create']);
Route::put('/trash/update', [TrashController::class, 'update']);
Route::post('/trash/add/capacity', [TrashController::class, 'AddCapacity']);
Route::delete('/trash/delete', [TrashController::class, 'delete']);

Route::get('/trash/history', [TrashHistoryController::class, 'index']);
Route::get('/trash/history/{id_status_history}', [TrashHistoryController::class, 'showHistoryToStatus']);
Route::get('/trash/{id_trash}/history/', [TrashHistoryController::class, 'showHistoryToTrash']);
Route::get('/trash/{id_trash}/history/{id_status_history}', [TrashHistoryController::class, 'showHistoryToHistoryToStatus']);
Route::post('/trash/history/create', [TrashHistoryController::class, 'create']);
Route::post('/trash/history/info', [TrashHistoryController::class, 'ShowHistoryTimestamp']);
Route::post('/organization/update', [TrashOrganizationController::class, 'update']);
Route::delete('/organization/delete', [TrashOrganizationController::class, 'delete']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/index', [UserController::class, 'indexView']);
Route::get('/user/info/{id}',[UserController::class,'show']);
Route::post('/user/create', [UserController::class, 'create']);
Route::put('/user/update', [UserController::class, 'update']);
Route::delete('/user/delete', [UserController::class, 'delete']);

Route::get('/team', [TrashTeamUsersController::class, 'index']);
Route::get('/team/index', [TrashTeamUsersController::class, 'indexView']);
Route::post('/team/create', [TrashTeamUsersController::class, 'create']);
Route::put('/team/update', [TrashTeamUsersController::class, 'update']);
Route::delete('/team/delete', [TrashTeamUsersController::class, 'delete']);
Route::get('/team/info/{id_team}', [TrashTeamUsersController::class, 'show']);



Route::get('/responsability/index', [TrashResponsability::class, 'indexView']);
