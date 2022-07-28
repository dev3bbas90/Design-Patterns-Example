<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'email'       => $this->email,
            'phone'       => $this->phone,
            'program'     => $this->event->program->title,
            'date'        => $this->event->date,
            'time'        => $this->event->time_frame->from,
            'theater'     => $this->event->theater->name,
            'hall'        => $this->event->hall->code,
            'total_price' => $this->total_price
        ];
    }
}
