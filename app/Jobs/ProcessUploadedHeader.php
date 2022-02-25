<?php

namespace App\Jobs;

use App\AnimalSurveillance;
use App\AnimalSurveillanceFinal;
use App\HumanSurveillance;
use App\HumanSurveillanceFinal;
use App\UploadHeader;
use Doctrine\DBAL\Driver\PDOException;
use http\Exception\RuntimeException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Psy\Exception\Exception;


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

    /*private $uploadHeaderRepository;
    private $animalSurveillanceRepository;*/


    public function __construct($uploadHeader,$uploadHeaderType)
    {

        $this->headerId = $uploadHeader;
        $this->type = $uploadHeaderType;
        /*$this->uploadHeaderRepository = $uploadHeaderRepo;
        $this->animalSurveillanceRepository = $animalSurveillanceRepo;*/
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
        $query = HumanSurveillance::query();
        $pendingHeader = $query->where(['upload_header_id'=>$headerId])->get();

        $total_accepted = 0;
        $total_rejected = 0;
        foreach ($pendingHeader as $key => $value){
            //dd($value);
            $total_accepted = $total_accepted + 1;

            // if

            $reject_reasons = array();
            $data = [
                'upload_header_id' => $value->upload_header_id,
                'organisation_unit_name' => $value->organisation_unit_name,
                'organisation_unit_code' => $value->organisation_unit_code,
                'disease' => $value->disease,
                'one_month_to_below_one_year' => $value->one_month_to_below_one_year,
                'one_to_below_five_years' => $value->one_to_below_five_years,
                'five_to_below_sixty_years' => $value->five_to_below_sixty_years,
            ];

            //$uploadHeader = $this->uploadHeaderRepository->find($headerId);
            $update_data = [
                'total_success' => $total_accepted,
                'total_failed' => $total_rejected,
            ];
            //print_r($update_data);
            $updateUploadHeader = $this->updateUploadHeader($update_data,$headerId);


            echo "Accepted ".$total_accepted."\n";
            echo "Rejected ".$total_rejected."\n";
            echo "Posting ".json_encode($data)."\n";

            try{
                $saveFinal = HumanSurveillanceFinal::create($data);
                $update_data = [
                    'valid_status' => 1,
                ];

            }catch (QueryException $ex){
                $total_rejected = $total_rejected + 1;
                array_push($reject_reasons,$ex->getMessage());

                $update_data = [
                    'valid_status' => 0,
                    'reject_reason' => implode(",",$reject_reasons),
                ];
                //throw new RuntimeException();
                echo "Rejected ".json_encode($update_data)."\n";

            }

            $updateUploadHeader = $this->updateStagingHumanSurveillance($update_data,$value->id);


        }

        if($total_rejected>0){
            $update_data = ['status'=>2];

        }else{
            $update_data = ['status'=>1];

        }
        $updateUploadHeader = $this->updateUploadHeader($update_data,$headerId);



    }

    private function processAnimalSurveillance($headerId)
    {
        $query = AnimalSurveillance::query();
        $pendingHeader = $query->where(['upload_header_id'=>$headerId])->get();

        $total_accepted = 0;
        $total_rejected = 0;
        foreach ($pendingHeader as $key => $value){
            //dd($value);
            $total_accepted = $total_accepted + 1;

           // if

            $reject_reasons = array();
            $data = [
                'upload_header_id' => $value->upload_header_id,
                'region' => $value->region,
                'district' => $value->district,
                'village' => $value->village,
                'observation_date' => $value->observation_date,
                'disease' => $value->disease,
                'specie_affected' => $value->specie_affected,
                'cases' => $value->cases,
                'death' => $value->death,
                'not_at_rist' => $value->not_at_rist,
                'treated' => $value->treated,
                'destroyed' => $value->destroyed,
                'slaughtered' => $value->slaughtered,
                'vaccinated' => $value->vaccinated,
                'lat' => $value->lat,
                'long' => $value->long,
            ];

            //$uploadHeader = $this->uploadHeaderRepository->find($headerId);
            $update_data = [
                'total_success' => $total_accepted,
                'total_failed' => $total_rejected,
            ];
            //print_r($update_data);
            $updateUploadHeader = $this->updateUploadHeader($update_data,$headerId);


            echo "Accepted ".$total_accepted."\n";
            echo "Rejected ".$total_rejected."\n";
            echo "Posting ".json_encode($data)."\n";

            try{
                $saveFinal = AnimalSurveillanceFinal::create($data);
                $update_data = [
                    'valid_status' => 1,
                ];

            }catch (QueryException $ex){
                $total_rejected = $total_rejected + 1;
                array_push($reject_reasons,$ex->getMessage());

                $update_data = [
                    'valid_status' => 0,
                    'reject_reason' => implode(",",$reject_reasons),
                ];
                //throw new RuntimeException();
                echo "Rejected ".json_encode($update_data)."\n";

            }

            $updateUploadHeader = $this->updateStagingAnimalSurveillance($update_data,$value->id);


        }

        if($total_rejected>0){
            $update_data = ['status'=>2];

        }else{
            $update_data = ['status'=>1];

        }
        $updateUploadHeader = $this->updateUploadHeader($update_data,$headerId);



        //print_r($data);
    }

    public function updateUploadHeader($updateData,$headerId){
        //$update = HliUploadHeader::where(['id'=>$request['contentheader'],'lms_sent_status'=>0])->update($data);


        return UploadHeader::where(['id'=>$headerId])->update($updateData);
        //return SipaDisbursement::on('oracle')->where(['disbursementid'=>$data['disbursementid']])->update(['olamsread'=>1]);

       // $uploadHeader = $this->uploadHeaderRepository->update($updateData, $headerId);
       // return $uploadHeader;
    }

    private function updateStagingAnimalSurveillance($updateData, $headerId)
    {
        return AnimalSurveillance::where(['id'=>$headerId])->update($updateData);

    }

    private function updateStagingHumanSurveillance($updateData, $headerId)
    {
        return HumanSurveillance::where(['id'=>$headerId])->update($updateData);

    }
}
