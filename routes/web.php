<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('templates.dashboard');
});

Route::get('/prova-db', function () {
    $result = DB::table('reports')->limit(5)->get();
    return $result;
});
