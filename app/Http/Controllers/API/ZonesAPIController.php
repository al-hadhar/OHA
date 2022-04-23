<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateZonesAPIRequest;
use App\Http\Requests\API\UpdateZonesAPIRequest;
use App\Zones;
use App\Repositories\ZonesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\ZonesResource;
use Response;

/**
 * Class ZonesController
 * @package App\Http\Controllers\API
 */

class ZonesAPIController extends AppBaseController
{
    /** @var  ZonesRepository */
    private $zonesRepository;

    public function __construct(ZonesRepository $zonesRepo)
    {
        $this->zonesRepository = $zonesRepo;
    }

    /**
     * Display a listing of the Zones.
     * GET|HEAD /zones
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $zones = $this->zonesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(ZonesResource::collection($zones), 'Zones retrieved successfully');
    }

    /**
     * Store a newly created Zones in storage.
     * POST /zones
     *
     * @param CreateZonesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateZonesAPIRequest $request)
    {
        $input = $request->all();

        $zones = $this->zonesRepository->create($input);

        return $this->sendResponse(new ZonesResource($zones), 'Zones saved successfully');
    }

    /**
     * Display the specified Zones.
     * GET|HEAD /zones/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Zones $zones */
        $zones = $this->zonesRepository->find($id);

        if (empty($zones)) {
            return $this->sendError('Zones not found');
        }

        return $this->sendResponse(new ZonesResource($zones), 'Zones retrieved successfully');
    }

    /**
     * Update the specified Zones in storage.
     * PUT/PATCH /zones/{id}
     *
     * @param int $id
     * @param UpdateZonesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateZonesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Zones $zones */
        $zones = $this->zonesRepository->find($id);

        if (empty($zones)) {
            return $this->sendError('Zones not found');
        }

        $zones = $this->zonesRepository->update($input, $id);

        return $this->sendResponse(new ZonesResource($zones), 'Zones updated successfully');
    }

    /**
     * Remove the specified Zones from storage.
     * DELETE /zones/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Zones $zones */
        $zones = $this->zonesRepository->find($id);

        if (empty($zones)) {
            return $this->sendError('Zones not found');
        }

        $zones->delete();

        return $this->sendSuccess('Zones deleted successfully');
    }
}
