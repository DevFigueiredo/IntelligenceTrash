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

use Illuminate\Support\Facades\Auth;



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




Route::get('/logout',[IndexController::class, 'logout']);
Route::get('/',[IndexController::class, 'index']);
Route::post('/',[IndexController::class, 'index'])->middleware('Login');


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
Route::post('/trash/history/table', [TrashHistoryController::class, 'ShowHistoryTable']);

Route::get('/user', [UserController::class, 'index']);
Route::get('/user/index', [UserController::class, 'indexView']);
Route::get('/user/info/{id}',[UserController::class,'show']);
Route::post('/user/create', [UserController::class, 'create']);
Route::put('/user/update', [UserController::class, 'update']);
Route::delete('/user/delete', [UserController::class, 'delete']);

Route::get('/team', [TrashTeamUsersController::class, 'index']);
Route::get('/team/permissions', [TrashTeamUsersController::class, 'IndexViewPermissions']);
Route::get('/team/index', [TrashTeamUsersController::class, 'indexView']);
Route::post('/team/create', [TrashTeamUsersController::class, 'create']);
Route::put('/team/update', [TrashTeamUsersController::class, 'update']);
Route::delete('/team/delete', [TrashTeamUsersController::class, 'delete']);
Route::get('/team/info/{id_team}', [TrashTeamUsersController::class, 'show']);



Route::get('/region', [TrashRegionsController::class, 'index']);
Route::get('/region/all', [TrashRegionsController::class, 'findAll']);
Route::post('/region/info', [TrashRegionsController::class, 'find']);
Route::post('/region/create', [TrashRegionsController::class, 'create']);
Route::post('/region/update', [TrashRegionsController::class, 'update']);
Route::delete('/region/delete', [TrashRegionsController::class, 'delete']);

Route::get('/organization', [TrashOrganizationController::class, 'index']);
Route::get('/organization/index', [TrashOrganizationController::class, 'indexView']);
Route::post('/organization/info', [TrashOrganizationController::class, 'find']);
Route::post('/organization/create', [TrashOrganizationController::class, 'create']);

Route::get('/responsability/index', [TrashResponsability::class, 'indexView']);
Route::get('/responsability', [TrashResponsability::class, 'index']);
Route::get('/responsability/team/{team_id}', [TrashResponsability::class, 'indexResponsabilityTeam']);
Route::post('/responsability/create/team/{team_id}', [TrashResponsability::class, 'create']);
Route::post('/responsability/update', [TrashResponsability::class, 'update']);
