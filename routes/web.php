<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CuriosityController;
use App\Http\Controllers\PoiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpottedController;
use App\Models\SupabaseUser;
use App\Models\Point;
use App\Models\Spotted;
use App\Models\Poi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

// Rotte di autenticazione Breeze
require __DIR__ . '/auth.php';

// Rotte protette per il profilo utente
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {

    // Dashboard principale
    Route::get('/', function () {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $users = SupabaseUser::all();
        $activeUsers = Point::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->distinct('userID')
            ->pluck('userID');
        $spotted = Spotted::all();
        $spottedMonth = Spotted::whereBetween('data', [$startOfMonth, $endOfMonth])->get();
        $poi = Poi::all();

        return view('dashboard.dashboard', compact('users', 'activeUsers', 'spotted', 'spottedMonth', 'poi'));
    })->name('dashboard.index');


    Route::get('/detail', function (Request $request) {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $filter = $request->query('filter');

        switch ($filter) {
            case 'users':
                $title = "Tutti gli utenti";
                $data = SupabaseUser::orderBy('username', 'asc')->paginate(10);
                $view = 'partials.usersTable';
                break;

            case 'activeUsers':
                $title = "Utenti attivi nell'ultimo mese";
                $usersID = Point::whereBetween('created_at', [$startOfMonth, $endOfMonth])
                    ->distinct('userID')
                    ->pluck('userID');
                $data = SupabaseUser::whereIn('id', $usersID)->paginate(10);
                $view = 'partials.usersTable';
                break;

            case 'spotted':
                $title = "Tutti gli avvistamenti";
                $data = Spotted::orderBy('data', 'desc')->paginate(10);
                $view = 'partials.spottedTable';
                break;

            case 'spottedMonth':
                $title = "Avvistamenti dell'ultimo mese";
                $data = Spotted::whereBetween('data', [$startOfMonth, $endOfMonth])->paginate(10);
                $view = 'partials.spottedTable';
                break;

            default:
                abort(404);
        }

        return view('dashboard.details', compact('title', 'data', 'filter', 'view'));
    })->name('dashboard.detail');

    // Rotta di test DB
    Route::get('/prova-db', function () {
        return DB::table('reports')->limit(5)->get();
    });

    Route::resource("admin", AdminController::class);

    // Risorse CRUD
    Route::resource('curiosity', CuriosityController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('spotted', SpottedController::class);
    Route::resource('poi', PoiController::class);
});
