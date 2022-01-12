<?php

namespace App\Jobs;

use App\AnimalSurveillance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessUploadedHeader implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $headerId;
    public $type;
    public function __construct($uploadHeader,$uploadHeaderType)
    {
        $this->headerId = $uploadHeader;
        $this->type = $uploadHeaderType;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $type =  $this->type;

        if($type==1){
            $this->processHumanSurveillance($this->headerId);
        }else if($type==2){
            $this->processAnimalSurveillance($this->headerId);
        }

    }

    private function processHumanSurveillance($headerId)
    {
    }

    private function processAnimalSurveillance($headerId)
    {
        $query = AnimalSurveillance::query();
        $pendingHeader = $query->where(['upload_header_id'=>$headerId])->get();

        foreach ($pendingHeader as $key => $value){
            $data = [
                'upload_header_id' => $value->upload_header_id,
                'region' => $value->upload_header_id,
                'district' => $value->upload_header_id,
                'village' => $value->upload_header_id,
                'observation_date' => $value->upload_header_id,
                'disease' => $value->upload_header_id,
                'specie_affected' => $value->upload_header_id,
                'cases' => $value->upload_header_id,
                'death' => $value->upload_header_id,
                'not_at_rist' => $value->upload_header_id,
                'treated' => $value->upload_header_id,
                'destroyed' => $value->upload_header_id,
                'slaughtered' => $value->upload_header_id,
                'vaccinated' => $value->upload_header_id,
                'lat' => $value->upload_header_id,
                'long' => $value->upload_header_id,
            ];
        }

        print_r($data);
    }
}
