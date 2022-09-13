<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('about', function () {
//     return view('about');
// });

Route::get('/', function(){
    return redirect()->route('home');
});
Route::get('about', [AboutController::class, 'index']);

Auth::routes();

Route::middleware('auth')->group(
    function () {
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('project', ProjectController::class);
    }
);
