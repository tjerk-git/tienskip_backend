<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SiteController extends Controller
{
  public function index()
  {
    $events = Event::orderBy('date', 'asc')->get();
    return view('site.index', ['events' => $events]);
  }

  // store the contact form
  public function store(Request $request)
  {
    // $request->validate([
    //   'name' => 'required',
    //   'email' => 'required|email',
    //   'message' => 'required'
    // ]);

    //dd($request->all());
    // send email
    // Mail::to(config('mail.from.address'))->send(new ContactForm($request->all()));

    return redirect('/contact')->with('message', 'Bedankt voor je bericht. We nemen zo snel mogelijk contact met je op.');
  }

}