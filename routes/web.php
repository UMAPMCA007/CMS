<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [CmsController::class, 'DashBoard']);
Route::get('/login',[CmsController::class, 'Login'])->name('login');
Route::get('/signup',[CmsController::class, 'signUp'])->name('signup');
Route::get('/admin',[CmsController::class, 'Admin'])->name('admin');
Route::post('/ps',[CmsController::class, 'postSignUp'])->name('ps');
Route::post('/pl',[CmsController::class, 'postLogin'])->name('pl');
Route::post('iu',[CmsController::class, 'imageUpload' ])->name('iu');
Route::get('/edit/{id}',[CmsController::class, 'Edit' ])->name('edit');
Route::post('/update/{id}',[CmsController::class, 'update' ])->name('update');
