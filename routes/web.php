<?php

use App\Http\Controllers\AdminUsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/borrame', function () {
    return view('borrame');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Aquí especificamos que el Controlador UsersAdminController va a administrar todas las rutas de admin/users (php artisan make_controller --resource AdminUsersController)
Route::resource('admin/users', 'AdminUsersController');

//Desde laravel 8 han hecho algo con los namespaces que no sabe donde buscar los controladores, por lo que hemos tenido que añadir el namespace de los controllers en el archivo RouteServiceProvider, para que laravel sepa donde buscar:
//Esta funciona, no sé por qué no me hacia la ruta users.index del GET, asi que ya se lo indico aquí:
Route::get('admin/users', [App\Http\Controllers\AdminUsersController::class, 'index'])->name('users.index');
//Esta no funciona:
//Route::get('admin/users', 'App\Http\Controllers\AdminUsersController@all');
//Esta también funciona, pero no hace lo del users.index:
//Route::get('admin/users', [AdminUsersController::class, 'view']);

