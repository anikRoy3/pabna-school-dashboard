<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class NoticeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'is_top'     => $this->is_top,
            'notice'     => $this->notice,
            'notice_pdf' => asset(Storage::url($this->notice_pdf)),
            'date'       => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'), 
        ];
    }
}
