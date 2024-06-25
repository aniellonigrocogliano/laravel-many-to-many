<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('dashboard');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('project.update');
        Route::resource('projects', ProjectController::class)->parameters([
            'projects' => 'project:slug'
        ])->only(['show', 'destroy', 'edit']);
    });

require __DIR__ . '/auth.php';
