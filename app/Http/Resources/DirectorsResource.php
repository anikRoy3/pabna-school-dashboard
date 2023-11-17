<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DirectorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            "email" => $this->email,
            'image_url' => asset(Storage::url($this->image)),
            'designation' => $this->designation,
            'biodata' => $this->biodata,
            'speech' => $this->speech,
            'subject' => $this->subject,
            'd_c_id' => $this->d_c_id
        ];
    }
}
