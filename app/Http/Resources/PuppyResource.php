<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PuppyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'trait' => $this->trait,
            'imageUrl' => config('filesystems.default') === 's3'
                ? Storage::url($this->image_url)
                : asset(Storage::url($this->image_url)),
            'likedBy' => $this->likedBy->pluck('id'),
        ];
    }
}
