<?php

use App\Http\Controllers\cmscontroller;
use App\Http\Controllers\dataController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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
    return view('main');
});

// Route::get('/coba', function () {
//    return view('user');
// });


// Route::get('dashboard', function(){
//     return view('admin.index');
// });

Route::resource('dataAdmin', dataController::class);
Route::resource('dataUser', userController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');

})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
   Route::get('/home', [loginController::class, 'index']);
   Route::middleware(['roleadmin'])->group(function(){
       Route::get('admin', function(){
           return view('admin.index');
       });
   });
});
