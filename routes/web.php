<?php

use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('beasiswa/list', [BeasiswaController::class, 'list'])
    ->name('beasiswa.list');

Route::resource('beasiswa', BeasiswaController::class);


