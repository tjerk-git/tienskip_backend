<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\EventController;

Route::get('/people', [PeopleController::class, 'index']);
Route::get('/events', [EventController::class, 'index']);