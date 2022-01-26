<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Courses extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'course' => $this->course,
            'course_url_link' => $this->course_url_link,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
        ];
    }
}
