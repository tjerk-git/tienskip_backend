<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\EventController;
use App\Models\Event;


Route::get('/', function () {
  $events = Event::all();
  return view('site.index', ['events' => $events]);
  //return view('site.index');
});

Route::get('/over-tienskip', function () {
  return view('site.over');
});

Route::get('/contact', function () {
  return view('site.contact');
});

Route::get('/doe-er-zelf-wat-aan', function () {
  return view('site.doe-er-zelf');
});

Route::get('/evenementen', function () {
  return view('site.evenementen');
});

Route::group(['prefix' => 'api'], function () {
  Route::get('/people', [PeopleController::class, 'index']);
  Route::get('/events', [EventController::class, 'index']);

  Route::get('/events/map', [EventController::class, 'map']);
});
