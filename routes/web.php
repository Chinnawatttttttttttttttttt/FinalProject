<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ElderlyController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ScoreTAIController;
use App\Http\Controllers\AuthController;
use App\Models\Position;
use App\Models\Department;
use App\Models\ScoreTAI;
use GuzzleHttp\Promise\Create;

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

route::get('error', function(){
    return view('error.error');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('home', [AuthController::class, 'home']);
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginUser'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'IsAdmin', 'CheckLogin', 'NowLogin'])->group(function () {
    
    //User
    Route::get('add-user', [UserController::class, 'create'])->name('add-user');
    Route::post('/create-user', [UserController::class, 'store'])->name('users.store');
    Route::get('/all-user', [UserController::class, 'index'])->name('all-user');
    // Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::post('/edit-user/{id}', [UserController::class, 'edit'])->name('users.update');
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy'])->name('users.delete');

    //Position
    //Department
    //Elderly
    //ScoreTAI

});

// Route::controller(UserController::class)->group(function(){
//     Route::get('add-user','create');
//     Route::post('/create-user','store')->name('users.store');

//     Route::get('/all-user','index')->name('all-user');

//     Route::get('edit-user/{id}','edit');
//     Route::post('/update-user','update')->name('users.update');

//     Route::delete('/delete-user/{id}','destroy')->name('users.delete');
// });

Route::controller(PositionController::class)->group(function(){
    Route::get('add-position','create');
    Route::post('/create-position','store')->name('positions.store');

    Route::get('all-position','index');

    Route::get('edit-position/{id}','edit');
    Route::post('/update-position','update')->name('positions.update');

    Route::delete('/delete-position/{id}','destroy')->name('positions.delete');
});

Route::controller(DepartmentController::class)->group(function(){
    Route::get('add-department','create');
    Route::post('/create-department','store')->name('departments.store');

    Route::get('all-department','index');

    Route::get('edit-department/{id}','edit');
    Route::post('/update-department','update')->name('departments.update');

    Route::delete('/delete-department/{id}','destroy')->name('departments.delete');
});

Route::controller(ElderlyController::class)->group(function(){
    Route::get('add-elderly','create');
    Route::post('/create-elderly','store')->name('elderlys.store');

    Route::get('all-elderly','index');

    Route::get('edit-elderly/{id}','edit');
    Route::post('/update-elderly','update')->name('elderlys.update');

    Route::delete('/delete-elderly/{id}','destroy')->name('elderlys.delete');
});

Route::controller(ScoreTAIController::class)->group(function() {
    Route::get('/score/{id}', 'create');

});




