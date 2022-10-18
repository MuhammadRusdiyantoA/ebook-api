<?php

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

Route::get('/coba', function() {
    $date = date('d-m-Y');
    $luckyNumber = random_int(1, 100);
    return "Halo nama saya joni<br>Kamu mengakses website ini pada ".$date."<br>Your lucky number is ".$luckyNumber;
});

Route::get('/coba1', function() {
    return ['Petra', 'Gunan', 'Kang Mus'];
});

Route::get('/coba2', function() {
    return [
        'nama' => 'Muhammad Rusdiyanto',
        'kelas' => 'XII RPL 5',
        'NIS' => 3103120152
    ];
});

Route::get('/coba3', function() {
    return response()->json(
        [
            'nama' => 'Muhammad Rusdiyanto',
            'kelas' => 'XII RPL 5',
            'NIS' => 3103120152
        ], 201
    );
});