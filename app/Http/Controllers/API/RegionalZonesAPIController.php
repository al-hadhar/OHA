<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRegionalZonesAPIRequest;
use App\Http\Requests\API\UpdateRegionalZonesAPIRequest;
use App\RegionalZones;
use App\Repositories\RegionalZonesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RegionalZonesResource;
use Response;

/**
 * Class RegionalZonesController
 * @package App\Http\Controllers\API
 */

class RegionalZonesAPIController extends AppBaseController
{
    /** @var  RegionalZonesRepository */
    private $regionalZonesRepository;

    public function __construct(RegionalZonesRepository $regionalZonesRepo)
    {
        $this->regionalZonesRepository = $regionalZonesRepo;
    }

    /**
     * Display a listing of the RegionalZones.
     * GET|HEAD /regionalZones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $regionalZones = $this->regionalZonesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
       // echo 'here hsfs'; exit;


        return $this->sendResponse(RegionalZonesResource::collection($regionalZones), 'Regional Zones retrieved successfully');
    }

    /**
     * Store a newly created RegionalZones in storage.
     * POST /regionalZones
     *
     * @param CreateRegionalZonesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionalZonesAPIRequest $request)
    {
        $input = $request->all();

        $regionalZones = $this->regionalZonesRepository->create($input);

        return $this->sendResponse(new RegionalZonesResource($regionalZones), 'Regional Zones saved successfully');
    }

    /**
     * Display the specified RegionalZones.
     * GET|HEAD /regionalZones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RegionalZones $regionalZones */
        $regionalZones = $this->regionalZonesRepository->find($id);

        if (empty($regionalZones)) {
            return $this->sendError('Regional Zones not found');
        }

        return $this->sendResponse(new RegionalZonesResource($regionalZones), 'Regional Zones retrieved successfully');
    }

    /**
     * Update the specified RegionalZones in storage.
     * PUT/PATCH /regionalZones/{id}
     *
     * @param int $id
     * @param UpdateRegionalZonesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionalZonesAPIRequest $request)
    {
        $input = $request->all();

        /** @var RegionalZones $regionalZones */
        $regionalZones = $this->regionalZonesRepository->find($id);

        if (empty($regionalZones)) {
            return $this->sendError('Regional Zones not found');
        }

        $regionalZones = $this->regionalZonesRepository->update($input, $id);

        return $this->sendResponse(new RegionalZonesResource($regionalZones), 'RegionalZones updated successfully');
    }

    /**
     * Remove the specified RegionalZones from storage.
     * DELETE /regionalZones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RegionalZones $regionalZones */
        $regionalZones = $this->regionalZonesRepository->find($id);

        if (empty($regionalZones)) {
            return $this->sendError('Regional Zones not found');
        }

        $regionalZones->delete();

        return $this->sendSuccess('Regional Zones deleted successfully');
    }
}
