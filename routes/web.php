<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\EventController;
use App\Models\Event;


Route::get('/', function () {
  $events = Event::all();

  // get event that hasn't happened yet
  $nextEvent = Event::where('start_date', '>', date('Y-m-d H:i:s'))->orderBy('start_date', 'asc')->first();

  return view('site.index', ['events' => $events, 'nextEvent' => $nextEvent]);
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
  $events = Event::all();
  return view('site.evenementen', ['events' => $events]);
});

Route::group(['prefix' => 'api'], function () {
  Route::get('/people', [PeopleController::class, 'index']);
  Route::get('/events', [EventController::class, 'index']);

  Route::get('/events/map', [EventController::class, 'map']);
});
