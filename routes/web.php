<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [LoginController::class, 'login']);

Route::post('login', [LoginController::class, 'authenticate']);

//Route::get('pagina1', [LoginController::class, 'pagina1']);

//Route::get('dashboard', [LoginController::class, 'dashboard']);
Route::get('dashboard', [DashboardController::class, 'dashboard']);


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


Route::delete('/dashboard/delete/{table}/{id}', [DashboardController::class, 'deleteEntry'])->name('deleteEntry');
//Route::get('/dashboard/edit/{table}/{id}', [DashboardController::class, 'editEntry'])->name('editEntry');
Route::get('/dashboard/{table}/{id}/edit', [DashboardController::class, 'editEntry'])->name('editEntry');
Route::post('/dashboard/update/{table}/{id}', [DashboardController::class, 'updateEntry'])->name('updateEntry');
Route::get('/dashboard/{table}/{id}/entry', [DashboardController::class, 'getEntry'])->name('getEntry');

Route::get('/dashboard/{table}/create', [DashboardController::class, 'createEntry'])->name('createEntry');
Route::post('/dashboard/{table}/store', [DashboardController::class, 'storeEntry'])->name('storeEntry');
