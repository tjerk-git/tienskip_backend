<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteControlller extends Controller
{
  public function index()
  {
    return view('site.index');
  }

}