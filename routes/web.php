<?php

use App\Http\Controllers\CuriosityController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SpottedController;
use App\Models\Curiosity;
use App\Models\Poi;
use App\Models\Point;
use App\Models\Spotted;
use App\Models\SupabaseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;



Route::get('/', function () {
    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();

    $users = SupabaseUser::all();
    $activeUsers = Point::whereBetween('created_at', [$startOfMonth, $endOfMonth])
        ->distinct('userID')       // prendi solo userID distinti
        ->pluck('userID');         // estrai solo la lista di userID
    //$spotted = Point::whereBetween('created_at', [$startOfMonth, $endOfMonth])->where("type", "Spotted")->get();
    $spotted = Spotted::all();
    $spottedMonth = Spotted::whereBetween('data', [$startOfMonth, $endOfMonth])->get();

    $poi = Poi::all();
    return view('dashboard.dashboard', ["users"=>$users, "activeUsers"=>$activeUsers, "spotted"=>$spotted, "spottedMonth"=>$spottedMonth, "poi"=>$poi]);
});
Route::get('/dashboard/detail', function (Request $request) {
    $startOfMonth = Carbon::now()->startOfMonth();
    $endOfMonth = Carbon::now()->endOfMonth();
    $filter = $request->query('filter');
    $title = "";
    $data = collect(); // collezione vuota

    switch ($filter) {
        case 'users':
            $title = "Tutti gli utenti";
            $data =  SupabaseUser::orderBy("username", "asc")->paginate(10);
            $view = "partials.usersTable";
            break;

        case 'activeUsers':
            $title = "Utenti attivi nell'ultimo mese";
            $view = "partials.usersTable";
            $usersID =Point::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                ->distinct('userID')       // prendi solo userID distinti
                ->pluck('userID');
            $data = SupabaseUser::whereIn('id', $usersID)->paginate(10);
            break;

        case 'spotted':
            $title = "Tutti gli avvistamenti";
            $data = Spotted::orderBy('data', 'desc')->paginate(10);;
            $view = "partials.spottedTable";
            break;

        case 'spottedMonth':
            $title = "Avvistamenti dell'ultimo mese";
            $data = Spotted::whereBetween('data', [$startOfMonth, $endOfMonth])->paginate(10);
            $view = "partials.spottedTable";
            break;

        default:
            abort(404);
    }

    return view('dashboard.details', [
        'title' => $title,
        'data' => $data,
        'filter' => $filter,
        'view' => $view
    ]);
})->name('dashboard.detail');

Route::get('/prova-db', function () {
    $result = DB::table('reports')->limit(5)->get();
    return $result;
});

Route::resource( 'curiosity', CuriosityController::class);
Route::resource( 'reports', ReportController::class);
Route::resource( 'spotted', SpottedController::class);
