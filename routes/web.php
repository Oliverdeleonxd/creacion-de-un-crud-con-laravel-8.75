<?php

use App\Http\Controllers\ClienteLaravelController;
use App\Http\Controllers\ClientController;

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


// Route::delete('client/destroy/{client}', 'ClienteLaravelController@destroy')->name('client.destroy');
// Route::get('/client/edit/{clienteLaravel}', 'ClienteLaravelController@edit')->name('client.edit');
   Route::put('client/{client}', 'ClienteLaravelController@update')->name('client.update');

    return view('welcome');

});

// Route::get('/clients/{id}', [ClienteLaravelController::class, 'show']);

Route::resource('client', ClienteLaravelController::class);
 



