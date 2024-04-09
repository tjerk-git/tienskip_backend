<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $people = Person::all();
        $peopleWithAvatar = $people->map(function ($person) {
            $person->avatar = asset('storage/' . $person->avatar);
            return $person;
        });

        return response()->json($peopleWithAvatar);
    }

}