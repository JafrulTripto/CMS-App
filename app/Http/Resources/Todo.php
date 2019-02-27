<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Todo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

//        return parent::toArray($request);

        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'status'=>$this->status
        ];
    }
}
