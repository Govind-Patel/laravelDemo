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

Route::post('saveData','InventorController@saveinvention');
Route::get('subinvention','InventorController@InventorControllerShow');
Route::post('saveEvent','InventorController@saveEventData');
Route::get('showEvent','InventorController@showEventDetails');
Route::get('edit/{id}','InventorController@edtinventor');
Route::post('updateEvent/{id}','InventorController@updateEventDetails');
Route::get('vote_event/{id}','InventorController@votesevnts');

// Route::get('/qrcode','InventorController@votesevnts');
