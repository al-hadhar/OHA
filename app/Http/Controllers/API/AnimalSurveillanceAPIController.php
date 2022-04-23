<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAnimalSurveillanceAPIRequest;
use App\Http\Requests\API\UpdateAnimalSurveillanceAPIRequest;
use App\AnimalSurveillance;
use App\Http\Resources\HumanSurveillanceResource;
use App\Http\Resources\UploadHeaderResource;
use App\Repositories\AnimalSurveillanceRepository;
use App\Repositories\UploadHeaderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\AnimalSurveillanceResource;
use Response;

/**
 * Class AnimalSurveillanceController
 * @package App\Http\Controllers\API
 */

class AnimalSurveillanceAPIController extends AppBaseController
{
    /** @var  AnimalSurveillanceRepository */
    private $animalSurveillanceRepository;
    private $uploadHeaderRepository;

    public function __construct(AnimalSurveillanceRepository $animalSurveillanceRepo,UploadHeaderRepository $uploadHeaderRepo)
    {
        $this->animalSurveillanceRepository = $animalSurveillanceRepo;
        $this->uploadHeaderRepository = $uploadHeaderRepo;


    }

    /**
     * Display a listing of the AnimalSurveillance.
     * GET|HEAD /animalSurveillances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $animalSurveillances = $this->animalSurveillanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(AnimalSurveillanceResource::collection($animalSurveillances), 'Animal Surveillances retrieved successfully');
    }

    /**
     * Store a newly created AnimalSurveillance in storage.
     * POST /animalSurveillances
     *
     * @param CreateAnimalSurveillanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAnimalSurveillanceAPIRequest $request)
    {
        $humansurv = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $request->getContent()), true );

        $headerData = [
            'type'=>2,
            'file_name'=>'Animal Surveillance',
            'file_path'=> null,
            'total_success => 0',
            'total_failed'=> 0,
        ];
        $createHeader = $this->uploadHeaderRepository->create($headerData);
        $newHeader = new UploadHeaderResource($createHeader);
        //var_dump($newHeader->id); exit;
        //var_dump($test); exit;
        // $humansurv = $request->getContent();
        $counter = 0;
        foreach ($humansurv as $value){
            $counter++;
            //print_r($value);
            $inputData = [
                'upload_header_id' => $newHeader->id,
                'region'=>$value['region'],
                'district'=>$value['district'],
                'village'=>$value['village'],
                'observation_date'=>$value['observation_date'],
                'disease'=>$value['disease'],
                'specie_affected'=>$value['species_affected'],
                'cases'=>$value['cases'],
                'death'=>$value['death'],
                'not_at_rist'=>$value['not_at_risk'],
                'treated'=>$value['treated'],
                'destroyed'=>$value['destroyed'],
                'slaughtered'=>$value['slaughtered'],
                'vaccinated'=>$value['vaccinated'],
                'lat'=>$value['lat'],
                'long'=>$value['long'],
                'status' => 1,
                'valid_status' => $value['valid_status'],
                'reject_reason' => $value['reject_reason'],
            ];

            //print_r($inputData); exit;
            $humanSurveillance = $this->animalSurveillanceRepository->create($inputData);
            new AnimalSurveillanceResource($humanSurveillance);
        }

        //update header
        $updateHeaderData = [
            'total_success' => $counter,
            'total_failed'=> 0,
            'status'=>1
        ];
        $updateHeader = $this->uploadHeaderRepository->update($updateHeaderData, $newHeader->id);

        return $this->sendResponse(new UploadHeaderResource($updateHeader), 'Animal Surveillance saved successfully');
    }

    /**
     * Display the specified AnimalSurveillance.
     * GET|HEAD /animalSurveillances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AnimalSurveillance $animalSurveillance */
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            return $this->sendError('Animal Surveillance not found');
        }

        return $this->sendResponse(new AnimalSurveillanceResource($animalSurveillance), 'Animal Surveillance retrieved successfully');
    }

    /**
     * Update the specified AnimalSurveillance in storage.
     * PUT/PATCH /animalSurveillances/{id}
     *
     * @param int $id
     * @param UpdateAnimalSurveillanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnimalSurveillanceAPIRequest $request)
    {
        $input = $request->all();

        /** @var AnimalSurveillance $animalSurveillance */
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            return $this->sendError('Animal Surveillance not found');
        }

        $animalSurveillance = $this->animalSurveillanceRepository->update($input, $id);

        return $this->sendResponse(new AnimalSurveillanceResource($animalSurveillance), 'AnimalSurveillance updated successfully');
    }

    /**
     * Remove the specified AnimalSurveillance from storage.
     * DELETE /animalSurveillances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AnimalSurveillance $animalSurveillance */
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            return $this->sendError('Animal Surveillance not found');
        }

        $animalSurveillance->delete();

        return $this->sendSuccess('Animal Surveillance deleted successfully');
    }
}
