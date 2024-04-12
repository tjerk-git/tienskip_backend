<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\EventController;


Route::get('/', function () {
  return view('site.index');
});

Route::group(['prefix' => 'api'], function () {
  Route::get('/people', [PeopleController::class, 'index']);
  Route::get('/events', [EventController::class, 'index']);
});
