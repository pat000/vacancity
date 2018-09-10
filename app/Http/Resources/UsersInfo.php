<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->info_id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'headline' => $this->headline,
            'position' => $this->position_id,
            'educ_id' => $this->educ_id,
            'country_id' => $this->country_id,
            'loc_id' => $this->loc_id,
            'zipcode' => $this->zipcode,
            'industry_id' => $this->industry_id,
            'tel_no' => $this->tel_no,
            'medialink' => $this->medialink,
            'position_id' => $this->position_id,
            'position' => $this->title,
            'company' => $this->company,
        ];
    }
    public function with($request){
        return [
            'version' => '1.0.0',
            'author' => url('http://thelostsaint.com')
        ];

    }
}
