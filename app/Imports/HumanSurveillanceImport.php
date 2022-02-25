<?php

namespace App\Imports;

use App\HumanSurveillance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HumanSurveillanceImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $headerId;
    public function __construct($uploadHeader)
    {
        $this->headerId = $uploadHeader;
    }


    public function model(array $row)
    {
        return new HumanSurveillance([
            'organisation_unit_name' => $row['organisation_unit_name'],
            'organisation_unit_code' => $row['organisation_unit_code'],
            'disease' => $row['disease'],
            'one_month_to_below_one_year' => $row['one_month_to_below_one_year'],
            'one_to_below_five_years' => $row['one_to_below_five_years'],
            'five_to_below_sixty_years' => $row['five_to_below_sixty_years'],
        ]);
    }
}
