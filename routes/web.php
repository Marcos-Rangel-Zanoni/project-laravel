<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostagemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\NotePadController;

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

// Home
// Route::group(['middleware' => 'auth'], function () {
// Suas rotas aqui
Route::get('/', [HomeController::class, 'show'])->name('site.home');

Route::any('/calendar', [CalendarController::class, 'index'])->name('site.calendar.index');
Route::post('/calendar', [CalendarController::class, 'store'])->name('calendar.store');
// Route::get('/calendar/pull', [CalendarController::class, 'pullAdd'])->name('calendar.pull');

// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload-image', [ProfileController::class, 'uploadImage'])->name('upload.image');
});

// Postagem
Route::middleware('auth')->group(function () {
    // Rotas de postagem aqui
    Route::any('/index', [PostagemController::class, 'index'])->name('postagem.index');
    Route::get('/postagem', [PostagemController::class, 'create'])->name('postagem.create');
    Route::post('/postagem/add', [PostagemController::class, 'store'])->name('postagem.store');
    Route::get('/postagem/pull', [PostagemController::class, 'pullAdd'])->name('postagem.pull');


    // Level
    Route::get('/level', [LevelController::class, 'show'])->name('level.show');
    Route::post('/level/increase', [LevelController::class, 'increase'])->name('level.increase');

    // Mission
    Route::get('/mission', [MissionController::class, 'showMission'])->name('mission.show');
    Route::post('/mission/complete', [MissionController::class, 'completeMission'])->name('mission.complete');

    // NotePad
    Route::get('/notes', [NotePadController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NotePadController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NotePadController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}', [NotePadController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NotePadController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NotePadController::class, 'destroy'])->name('notes.destroy');
});

require __DIR__ . '/auth.php';
