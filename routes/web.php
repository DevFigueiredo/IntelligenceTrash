<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TrashController;
use App\Http\Controllers\TrashCapacityController;
use App\Http\Controllers\TrashRegionsController;
use App\Http\Controllers\TrashOrganizationController;
use App\Http\Controllers\DashboardController;
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
Route::get('/',[DashboardController::class, 'index']);

Route::get('/trash', [TrashController::class, 'index']);
Route::get('trash/info/{id}',[TrashController::class,'show']);
Route::post('/trash/create', [TrashController::class, 'create']);
Route::put('/trash/update', [TrashController::class, 'update']);
Route::put('/trash/update/capacity', [TrashController::class, 'updateCapacity']);
Route::delete('/trash/delete', [TrashController::class, 'delete']);

Route::get('/region', [TrashRegionsController::class, 'index']);
Route::post('/region/info', [TrashRegionsController::class, 'find']);
Route::post('/region/create', [TrashRegionsController::class, 'create']);
Route::post('/region/update', [TrashRegionsController::class, 'update']);
Route::delete('/region/delete', [TrashRegionsController::class, 'delete']);

Route::get('/organization', [TrashOrganizationController::class, 'index']);
Route::post('/organization/create', [TrashOrganizationController::class, 'create']);
Route::put('/organization/update', [TrashOrganizationController::class, 'update']);
Route::delete('/organization/delete', [TrashOrganizationController::class, 'delete']);

