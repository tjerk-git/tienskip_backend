<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeopleController extends Controller
{
    // public function index()
    // {
    //     $people = Person::all();
    //     $peopleWithAvatar = $people->map(function ($person) {
    //         $person->avatar = asset('storage/' . $person->avatar);
    //         return $person;
    //     });

    //     return response()->json($peopleWithAvatar);
    // }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $people = Person::where('name', 'LIKE', "%{$query}%")
            ->get()
            ->map(function ($person) {
                if ($person->avatar) {
                    $person->avatar = asset('storage/' . $person->avatar);
                }
                return $person;
            });
        
        return response()->json($people);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:people,id',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'description' => 'nullable|string',
            'fact' => 'nullable|string',
            'member_since' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048'
        ]);

        $person = Person::findOrFail($request->id);
        
        $person->name = $request->name;
        $person->email = $request->email;
        $person->description = $request->description;
        $person->fact = $request->fact;
        $person->member_since = $request->member_since;

        if ($request->hasFile('avatar')) {
            // Delete old avatar if exists
            if ($person->avatar) {
                Storage::disk('public')->delete($person->avatar);
            }
            
            // Store new avatar
            $path = $request->file('avatar')->store('avatars', 'public');
            $person->avatar = $path;
        }

        $person->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);
    }
}