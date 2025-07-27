<?php

use App\Http\Controllers\CuriosityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SpottedController;
use App\Models\Curiosity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templates.dashboard');
});

Route::get('/prova-db', function () {
    $result = DB::table('reports')->limit(5)->get();
    return $result;
});

Route::resource( 'curiosity', CuriosityController::class);
Route::resource( 'reports', ReportController::class);
Route::resource( 'spotted', SpottedController::class);
