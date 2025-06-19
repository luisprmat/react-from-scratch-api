<?php

namespace App\Http\Controllers;

use App\Http\Resources\PuppyResource;
use App\Models\Puppy;
use Illuminate\Http\Request;

class PuppyController extends Controller
{
    // ------------------------------
    // Get all puppies
    // ------------------------------
    public function index()
    {
        sleep(1);

        return PuppyResource::collection(Puppy::all());
    }

    // ------------------------------
    // Create new puppy
    // ------------------------------
    public function store(Request $request)
    {
        sleep(1);

        $validated = $request->validate([
            'name' => 'required|string',
            'trait' => 'required|string',
            'image_url' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('image_url');
        $path = $file->store('puppies', 'public');

        $puppy = Puppy::factory()->create([
            ...$validated,
            'image_url' => $path,
        ]);

        return PuppyResource::make($puppy);
    }

    // ------------------------------
    // Toggle like status for a puppy
    // ------------------------------
    public function like(Puppy $puppy)
    {
        sleep(1);
        $puppy->likedBy()->toggle(1);

        return PuppyResource::make($puppy);
    }
}
