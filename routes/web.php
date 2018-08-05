<?php

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
//     if (Auth::check()) {
//       return view('layouts.app');
//     } else {
//       return redirect('/login');
//     }
// });

// Route::get('/login', function () {
//   if (Auth::check()) {
//     return redirect('/');
//   } else {
//     return view('auth.login');
//   }
// });

// Route::get('/register', function () {
//   if (Auth::check()) {
//     return redirect('/');
//   } else {
//     return view('auth.register');
//   }
// });

// Auth::routes();


// Route::get('/logout', function () {
//   Auth::logout();
//   return redirect('/login');
// })->name('logout');

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
