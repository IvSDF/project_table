<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/', [ProjectController::class, 'index'])->name('home');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project.show');

    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/store', [ProjectController::class, 'store'])->name('project.store');

    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/projects/{project}/update', [ProjectController::class, 'update'])->name('project.update');

    Route::delete('/projects/{project}/destroy', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::post('/projects/{project}/status', [ProjectController::class, 'search'])->name('search');
});

Route::middleware('auth')->group(function (){
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('task.show');

    Route::get('/projects/{project}/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/', [TaskController::class, 'store'])->name('task.store');

    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::post('/tasks/{task}/update', [TaskController::class, 'update'])->name('task.update');

    Route::delete('/tasks/{task}/destroy', [TaskController::class, 'destroy'])->name('task.destroy');

    Route::get('/tasks/{task}/download', [TaskController::class, 'download'])->name('task.download');

    Route::post('/tasks/{task}/status', [TaskController::class, 'status'])->name('task.status');
});
