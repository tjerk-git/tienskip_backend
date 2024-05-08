<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\EventController;
use App\Models\Event;
use App\Models\Person;


Route::get('/', function () {
  $events = Event::all();

  // get event that hasn't happened yet
  $nextEvent = Event::where('start_date', '>', date('Y-m-d H:i:s'))->orderBy('start_date', 'asc')->first();

  return view('site.index', ['events' => $events, 'nextEvent' => $nextEvent]);
});

Route::get('/over-tienskip', function () {
  $people = Person::all();

  return view('site.over', ['people' => $people]);
});

Route::get('/contact', function () {
  return view('site.contact');
});

// post to contact 
Route::post('/contact', [SiteController::class, 'store']);

Route::get('/doe-er-zelf-wat-aan', function () {
  $events = Event::all();
  return view('site.doe-er-zelf', ['events' => $events]);
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
