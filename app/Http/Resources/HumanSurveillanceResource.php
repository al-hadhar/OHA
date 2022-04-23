<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HumanSurveillanceResource extends JsonResource
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
            'organisation_unit_name' => $this->organisation_unit_name,
            'organisation_unit_code' => $this->organisation_unit_code,
            'disease' => $this->disease,
            'zero_year' => $this->zero_year,
            'one_to_below_five_years' => $this->one_to_below_five_years,
            'five_to_below_sixty_years' => $this->five_to_below_sixty_years,
            'observation_date' => $this->observation_date,
            'status' => $this->status,
            'valid_status' => $this->valid_status,
            'reject_reason' => $this->reject_reason,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
