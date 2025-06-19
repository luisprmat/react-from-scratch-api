<?php

namespace Database\Seeders;

use App\Models\Puppy;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $me = User::factory()->create([
            'name' => 'Me',
            'email' => 'test@example.com',
        ]);

        $puppyData = [
            [
                'name' => 'Frisket',
                'trait' => 'Mother of all pups',
            ],
            [
                'name' => 'Chase',
                'trait' => 'Very good boi',
            ],
            [
                'name' => 'Leia',
                'trait' => 'Enjoys naps',
            ],
            [
                'name' => 'Pupi',
                'trait' => 'Loves cheese',
            ],
            [
                'name' => 'Russ',
                'trait' => 'Ready to save the world',
            ],
            [
                'name' => 'Yoko',
                'trait' => 'Ready for anything',
            ],
            [
                'name' => 'Luna',
                'trait' => 'Howls at the moon',
            ],
            [
                'name' => 'Rex',
                'trait' => 'Fetches everything',
            ],
            [
                'name' => 'Bella',
                'trait' => 'Always happy',
            ],
        ];

        foreach ($puppyData as $index => $data) {
            $position = $index + 1;
            $imagePath = Storage::disk('public')->putFile('puppies', new File(storage_path("app/seeders/images/{$position}.jpg")), 'public');
            $puppy = Puppy::factory()->create($data + ['image_url' => $imagePath]);

            // Mark puppies 1 and 3 as liked by the "me" user (id: 1)
            if ($index === 0 || $index === 2) {
                $puppy->likedBy()->attach($me->id);
            }
        }
    }
}
