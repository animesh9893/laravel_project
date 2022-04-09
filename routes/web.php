<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\deviceController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('logout',[UserController::class,'logout']);

Route::get('login',[UserController::class,'loginGET']);
Route::post('login',[UserController::class,'loginPOST']);

Route::view('signup','signup');
Route::post('signup',[UserController::class,'signupPOST']);

Route::get('dashboard',[DashboardController::class,'getDashboard'])->middleware('authUser');

Route::get('device',[deviceController::class,'deviceGET'])->middleware('authUser');
Route::get('createNewDevice',[deviceController::class,'createDevice'])->middleware('authUser');

Route::get('exercise',[ExerciseController::class,'exerciseGET'])->middleware('authUser');
Route::get('newExercise',[ExerciseController::class,'newExerciseGET'])->middleware('authUser');

Route::get('deleteExercise',[ExerciseController::class,'deleteExercise'])->middleware('authUser');

Route::get('editExercise',[ExerciseController::class,'editExercise'])->middleware('authUser');
Route::get('editExerciseUpdate',[ExerciseController::class,'editExercisePOST'])->middleware('authUser');

Route::get('addExerciseList',[ExerciseController::class,'addExerciseList'])->middleware('authUser');


// addExerciseList
