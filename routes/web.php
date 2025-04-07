<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Blog\ArticleController;

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

Auth::routes();

Route::get('/', [ArticleController::class, 'index'])->name('');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

$groupData = [
    
];
Route::group($groupData, function() {
    
    $methods = ['index', 'store', 'show', 'create'];
    Route::resource('article', ArticleController::class)->only($methods)
        ->names('article');
});
Route::get('/new', [ArticleController::class, 'create'])->name('new');