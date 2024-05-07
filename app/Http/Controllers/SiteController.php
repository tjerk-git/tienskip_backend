<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

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


    // send mail to info@tienskip.nl containing all the form fields with subject 'Contactformulier ingevuld door: $name'
    $mailData = [
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'company' => $request->input('bedrijfsnaam'),
      'phone' => $request->input('telefoon'),
      'message' => $request->input('message')
    ];

    Mail::to('info@tienskip.nl')->send(new ContactMail($mailData));

    // if email is sent successfully redirect back to the contact page with a success message
    return redirect('/contact')->with('message', 'Bedankt voor je bericht. We nemen zo snel mogelijk contact met je op.');
  }

}