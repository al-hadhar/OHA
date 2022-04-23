<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRegionsAPIRequest;
use App\Http\Requests\API\UpdateRegionsAPIRequest;
use App\Regions;
use App\Repositories\RegionsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\RegionsResource;
use Response;

/**
 * Class RegionsController
 * @package App\Http\Controllers\API
 */

class RegionsAPIController extends AppBaseController
{
    /** @var  RegionsRepository */
    private $regionsRepository;

    public function __construct(RegionsRepository $regionsRepo)
    {
        $this->regionsRepository = $regionsRepo;
    }

    /**
     * Display a listing of the Regions.
     * GET|HEAD /regions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $regions = $this->regionsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(RegionsResource::collection($regions), 'Regions retrieved successfully');
    }

    /**
     * Store a newly created Regions in storage.
     * POST /regions
     *
     * @param CreateRegionsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRegionsAPIRequest $request)
    {
        $input = $request->all();

        $regions = $this->regionsRepository->create($input);

        return $this->sendResponse(new RegionsResource($regions), 'Regions saved successfully');
    }

    /**
     * Display the specified Regions.
     * GET|HEAD /regions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Regions $regions */
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            return $this->sendError('Regions not found');
        }

        return $this->sendResponse(new RegionsResource($regions), 'Regions retrieved successfully');
    }

    /**
     * Update the specified Regions in storage.
     * PUT/PATCH /regions/{id}
     *
     * @param int $id
     * @param UpdateRegionsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRegionsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Regions $regions */
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            return $this->sendError('Regions not found');
        }

        $regions = $this->regionsRepository->update($input, $id);

        return $this->sendResponse(new RegionsResource($regions), 'Regions updated successfully');
    }

    /**
     * Remove the specified Regions from storage.
     * DELETE /regions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Regions $regions */
        $regions = $this->regionsRepository->find($id);

        if (empty($regions)) {
            return $this->sendError('Regions not found');
        }

        $regions->delete();

        return $this->sendSuccess('Regions deleted successfully');
    }
}
