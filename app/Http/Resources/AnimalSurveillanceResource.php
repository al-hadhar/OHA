<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnimalSurveillanceResource extends JsonResource
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
            'id' => $this->id,
            'upload_header_id' => $this->upload_header_id,
            'region' => $this->region,
            'district' => $this->district,
            'village' => $this->village,
            'observation_date' => $this->observation_date,
            'disease' => $this->disease,
            'specie_affected' => $this->specie_affected,
            'cases' => $this->cases,
            'death' => $this->death,
            'not_at_rist' => $this->not_at_rist,
            'treated' => $this->treated,
            'destroyed' => $this->destroyed,
            'slaughtered' => $this->slaughtered,
            'vaccinated' => $this->vaccinated,
            'lat' => $this->lat,
            'long' => $this->long,
            'status' => $this->status,
            'valid_status' => $this->valid_status,
            'reject_reason' => $this->reject_reason,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
