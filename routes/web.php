<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PartnerController;
use App\Models\Event;
use App\Models\Person;
use App\Models\Redirect;
use App\Models\Blogitem;
use Illuminate\Http\Request;

$redirects = Redirect::all();

if ($redirects->count() > 0) {
    foreach ($redirects as $redirect) {
        Route::redirect($redirect->source, $redirect->destination);
    }
}

Route::get("/", function () {
    $events = Event::whereNotNull("start_date")
        ->where("start_date", ">", date("Y-m-d H:i:s"))
        ->orderBy("start_date", "asc")
        ->get();

    // get event that hasn't happened yet
    $nextEvent = Event::where("start_date", ">", date("Y-m-d H:i:s"))
        ->orderBy("start_date", "asc")
        ->first();

    return view("site.index", ["events" => $events, "nextEvent" => $nextEvent]);
});

Route::get("/over-tienskip", function () {
    $people = Person::all();

    return view("site.over", ["people" => $people]);
});

Route::get("/contact", function () {
    return view("site.contact");
});

Route::get("/profiel-updaten", function () {
    return view("site.freewilly");
});

// post to contact
Route::post("/contact", [SiteController::class, "store"]);

Route::get("/doe-er-zelf-wat-aan", function () {
    $events = Event::whereNotNull("start_date")
        ->orderBy("start_date", "asc")
        ->get();
    return view("site.doe-er-zelf", ["events" => $events]);
});

Route::get("/evenementen", function () {
    $events = Event::whereNotNull("start_date")
        ->orderBy("start_date", "asc")
        ->get();
    return view("site.evenementen", ["events" => $events]);
});

Route::group(["prefix" => "api"], function () {
    Route::get("/events", [EventController::class, "index"]);

    Route::get("/events/map", [EventController::class, "map"]);

    // Profile routes
    Route::get("/people/search", [PeopleController::class, "search"])->name(
        "people.search"
    );
    Route::put("/people/update", [PeopleController::class, "update"])->name(
        "people.update"
    );
});

Route::get("/succesverhalen/{slug}", function (Request $request) {
    $blogitem = Blogitem::where("slug", $request->slug)->first();

    // if no blogitem is found show 404
    if (!$blogitem->title) {
        abort(404);
    } else {
        return view("site.succesverhaal", ["blogitem" => $blogitem]);
    }
});

Route::get("/partners", [
    App\Http\Controllers\PartnerController::class,
    "index",
])->name("partners");

Route::middleware("auth")->group(function () {
    // Add routes that require authentication here
});
