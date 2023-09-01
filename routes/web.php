<?php
namespace  App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Models\Game;
use App\Models\Player;
use App\Models\PlayerGame;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

Route::get('/', [AuthController::class, 'index']);
Route::get('register', [AuthController::class, 'showRegister']);
Route::post('register', [AuthController::class, 'register']);
Route::get('login' ,[AuthController::class , 'showLogin'])->name('login');
Route::post('login', [AuthController::class , 'login']);
Route::get('logout',[AuthController::class,'logout'])->middleware('auth');
Route::get('delete/{player}' , [TrainerController::class,'delete'])->middleware('auth');
Route::get('create-match' ,[TrainerController::class,'ShowCreatForm'])->middleware('auth');
Route::post('create-match',[TrainerController::class,'creatMatch'])->middleware('auth');
Route::get('add-player' , [TrainerController::class,'showAddForm'])->middleware('auth');
Route::post('add',[TrainerController::class,'add'])->middleware('auth');
Route::get('dashboard-trainer' , [TrainerController::class,'show'])->middleware('auth');
Route::get('player-info' , [PlayerController::class,'show'])->middleware('auth');




