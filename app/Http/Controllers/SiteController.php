<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SiteControlller extends Controller
{
  public function index()
  {
    $events = Event::orderBy('date', 'asc')->get();
    return view('site.index', ['events' => $events]);
  }

}