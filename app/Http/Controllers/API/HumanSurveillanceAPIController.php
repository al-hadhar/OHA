<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHumanSurveillanceAPIRequest;
use App\Http\Requests\API\UpdateHumanSurveillanceAPIRequest;
use App\Http\Resources\UploadHeaderResource;
use App\HumanSurveillance;
use App\Repositories\HumanSurveillanceRepository;
use App\Repositories\UploadHeaderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\HumanSurveillanceResource;
use Response;

/**
 * Class HumanSurveillanceController
 * @package App\Http\Controllers\API
 */

class HumanSurveillanceAPIController extends AppBaseController
{
    /** @var  HumanSurveillanceRepository */
    private $humanSurveillanceRepository;
    private $uploadHeaderRepository;

    public function __construct(HumanSurveillanceRepository $humanSurveillanceRepo, UploadHeaderRepository $uploadHeaderRepo)
    {
        $this->humanSurveillanceRepository = $humanSurveillanceRepo;
        $this->uploadHeaderRepository = $uploadHeaderRepo;
    }

    /**
     * Display a listing of the HumanSurveillance.
     * GET|HEAD /humanSurveillances
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $humanSurveillances = $this->humanSurveillanceRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(HumanSurveillanceResource::collection($humanSurveillances), 'Human Surveillances retrieved successfully');
    }

    /**
     * Store a newly created HumanSurveillance in storage.
     * POST /humanSurveillances
     *
     * @param CreateHumanSurveillanceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHumanSurveillanceAPIRequest $request)
    {
        $input = $request->all();

        $humansurv = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $request->getContent()), true );

        $headerData = [
            'type'=>1,
            'file_name'=>'Human Surveillance',
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
                'organisation_unit_name' => $value['organisation_unit_name'],
                'organisation_unit_code' => null,
                'disease' => $value['disease'],
                'zero_year' => $value['zero_year'],
                'one_to_below_five_years' => $value['one_to_below_five_years'],
                'five_to_below_sixty_years' => $value['five_to_below_sixty_years'],
                'observation_date' => $value['observation_date'],
                'status' => 1,
                'valid_status' => $value['valid_status'],
                'reject_reason' => $value['reject_reason'],
            ];

//            print_r($inputData);
            $humanSurveillance = $this->humanSurveillanceRepository->create($inputData);
            new HumanSurveillanceResource($humanSurveillance);
        }

        //update header
        $updateHeaderData = [
            'total_success' => $counter,
            'total_failed'=> 0,
            'status'=>1
        ];
        $updateHeader = $this->uploadHeaderRepository->update($updateHeaderData, $newHeader->id);

        return $this->sendResponse(new UploadHeaderResource($updateHeader), 'Human Surveillance saved successfully');
    }

    /**
     * Display the specified HumanSurveillance.
     * GET|HEAD /humanSurveillances/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HumanSurveillance $humanSurveillance */
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            return $this->sendError('Human Surveillance not found');
        }

        return $this->sendResponse(new HumanSurveillanceResource($humanSurveillance), 'Human Surveillance retrieved successfully');
    }

    /**
     * Update the specified HumanSurveillance in storage.
     * PUT/PATCH /humanSurveillances/{id}
     *
     * @param int $id
     * @param UpdateHumanSurveillanceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHumanSurveillanceAPIRequest $request)
    {
        $input = $request->all();

        /** @var HumanSurveillance $humanSurveillance */
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            return $this->sendError('Human Surveillance not found');
        }

        $humanSurveillance = $this->humanSurveillanceRepository->update($input, $id);

        return $this->sendResponse(new HumanSurveillanceResource($humanSurveillance), 'HumanSurveillance updated successfully');
    }

    /**
     * Remove the specified HumanSurveillance from storage.
     * DELETE /humanSurveillances/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HumanSurveillance $humanSurveillance */
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            return $this->sendError('Human Surveillance not found');
        }

        $humanSurveillance->delete();

        return $this->sendSuccess('Human Surveillance deleted successfully');
    }
}
