<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LeadDevController;
use App\Http\Controllers\ManagerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
// Manager routes
    Route::resource('manager', ManagerController::class)->middleware('can:isManager');
    Route::resource('leadDev', LeadDevController::class)->middleware('can:isManager');
    Route::resource('developer', DeveloperController::class)->middleware('can:isManager');

// Project routes with Manager middleware
    Route::resource('project', ProjectController::class)->middleware('can:isManager,App\Models\Project');

    //route to all (index and show)
    Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/project/{project}', [ProjectController::class, 'show']) ->name('project.show');
        //->middleware('can:view,project');

// Status routes with Lead Developer middleware
    Route::post('/statuses', [StatusController::class, 'store'])->name('status.store');
    Route::get('/status/create/{project}', [StatusController::class,'create'])->name('status.create')->middleware('can:isLeadDeveloper');
    Route::get('/status/{project}', [StatusController::class, 'show'])->name('status.show');
});
