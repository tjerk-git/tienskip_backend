<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
  public function index()
  {
    $events = Event::all();
    return response()->json($events);
  }

  public function map()
  {
    // 12 dutch provinces in an array
    $provinces = ['Drenthe', 'Flevoland', 'Friesland', 'Gelderland', 'Groningen', 'Limburg', 'Noord-Brabant', 'Noord-Holland', 'Overijssel', 'Utrecht', 'Zeeland', 'Zuid-Holland'];

    // create new JSON object
    $json = new \stdClass();
    $json->provinces = [];  // Initialize the provinces array

    $images = ['first', 'second', 'third'];

    // loop through the provinces and get the events
    foreach ($provinces as $province) {

      $events = Event::where('province', 'like', '%' . $province . '%')->orderBy('start_date', 'desc')->get();

      $html = "<div class='map_province'><h1 class='red_box align_center'>" . ucfirst($province) . "</h1>";
      foreach ($events as $event) {
        $random_img = $images[array_rand($images)];
        if($event->start_date){
          $html .= "<div class='mini_event " . $random_img . "'><div class='mini_event_container'><div class='mini_event_title'>" . $event->start_date->isoFormat('D MMMM YYYY') . "</div><div class='mini_event_location'>$event->address</div></div></div>";
        }
      }
      $html .= "</div>";

      // add the province key with its HTML content
      //$json->provinces[$province] = $html;

      // create an array with the province name and the events
      $json->provinces[] = ['province' => $province, 'events' => $html];
    }

    return response()->json($json);
  }

}