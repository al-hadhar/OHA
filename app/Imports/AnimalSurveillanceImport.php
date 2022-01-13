<?php

namespace App\Imports;

use App\AnimalSurveillance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class AnimalSurveillanceImport implements ToModel,WithHeadingRow
{
    public $headerId;
    public function __construct($uploadHeader)
    {
        $this->headerId = $uploadHeader;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       // echo $this->headerId; exit;
        return new AnimalSurveillance([
            //
            'upload_header_id'=> $this->headerId,
            'region'=>$row['region'],
            'district'=>$row['district'],
            'village'=>$row['village'],
            'observation_date'=>$row['date_of_observation'],
            'disease'=>$row['disease'],
            'specie_affected'=>$row['specie_affected'],
            'cases'=>$row['cases'],
            'death'=>$row['death'],
            'not_at_rist'=>$row['no_at_risk'],
            'treated'=>$row['treated'],
            'destroyed'=>$row['destroyed'],
            'slaughtered'=>$row['slaughtered'],
            'vaccinated'=>$row['vaccinated'],
            'lat'=>$row['lat'],
            'long'=>$row['long'],
            'status'=>0
        ]);
    }

    /**
     * @inheritDoc
     */
   /* public function startRow(): int
    {
        // TODO: Implement startRow() method.
    }*/
}
