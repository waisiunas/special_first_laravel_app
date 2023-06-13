<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::get('/users', function () {
//     $users = [
//         'Ali',
//         'Hassan',
//         'Saif',
//     ];
//     return view('users', [
//         'users' => $users
//     ]);
// })->name('users');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/users', [UserController::class, 'show_users'])->name('users');
Route::get('/user/create', [UserController::class, 'create_user'])->name('create_user');
Route::get('/user/edit', [UserController::class, 'edit_user'])->name('edit_user');
Route::get('/user/delete', [UserController::class, 'delete_user'])->name('delete_user');
