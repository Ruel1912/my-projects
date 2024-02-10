<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/about', [UserController::class, 'about']);
    Route::get('/contact', [UserController::class, 'contact']);
    Route::get('/all', [UserController::class, 'all']);
});
// Route::get('/user/', [UserController::class, 'index']);
// Route::get('/user/about', [UserController::class, 'about']);
// Route::get('/user/contact', [UserController::class, 'contact']);
// Route::get('/user/{surname}/{name}', [UserController::class, 'show']);
// Route::get('/user/{username}', [UserController::class, 'city']);
Route::get('/users/all', [UserController::class, 'all']);
Route::get('/users/show', [UserController::class, 'show']);
// Route::get('/posts/{date}', function ($date) {
//     return "date: $date";
// })->where('date', '^\d{4}-\d{2}-\d{2}$');

// Route::get('/post/{slug}', function ($slug) {
//     return "Slug: $slug";
// });


// Route::get('/user/{surname}/{name}', function ($surname, $name) {
//     return "Name: $name. Surname: $surname";
// });

// Route::get('/city/{city?}', function ($city = 'minsk') {
//     return "City: $city";
// })->whereAlpha('city');

// Route::get('/user/{id}/{name}', function ($id, $name) {
//     return "userId: $id userName: $name";
// })->whereNumber('id')->whereAlpha('name');

// Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
//     return "$day-$month-$year";
// })->where('year', '^\d{4}$')->where('month', '^(0[1-9]|1[0-2])$')->where('day', '^([0-2][1-9]|3[01])$');

// Route::get('/users/{order}', function ($order) {
//     return "Type order: $order";
// })->where('order', 'name|surname|age');


// Route::prefix('admin')->group(function() {
//     Route::get('/users', function () {
//         return 'all';
//     });
//     Route::get('/user/{id}', function ($id) {
//         return $id;
//     });
// });

// Route::get('/user/profile', function () {
//     return 'profile';
// })->name('profiles');
