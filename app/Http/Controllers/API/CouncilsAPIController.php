<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCouncilsAPIRequest;
use App\Http\Requests\API\UpdateCouncilsAPIRequest;
use App\Councils;
use App\Repositories\CouncilsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\CouncilsResource;
use Response;

/**
 * Class CouncilsController
 * @package App\Http\Controllers\API
 */

class CouncilsAPIController extends AppBaseController
{
    /** @var  CouncilsRepository */
    private $councilsRepository;

    public function __construct(CouncilsRepository $councilsRepo)
    {
        $this->councilsRepository = $councilsRepo;
    }

    /**
     * Display a listing of the Councils.
     * GET|HEAD /councils
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $councils = $this->councilsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(CouncilsResource::collection($councils), 'Councils retrieved successfully');
    }

    /**
     * Store a newly created Councils in storage.
     * POST /councils
     *
     * @param CreateCouncilsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCouncilsAPIRequest $request)
    {
        $input = $request->all();

        $councils = $this->councilsRepository->create($input);

        return $this->sendResponse(new CouncilsResource($councils), 'Councils saved successfully');
    }

    /**
     * Display the specified Councils.
     * GET|HEAD /councils/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Councils $councils */
        $councils = $this->councilsRepository->find($id);

        if (empty($councils)) {
            return $this->sendError('Councils not found');
        }

        return $this->sendResponse(new CouncilsResource($councils), 'Councils retrieved successfully');
    }

    /**
     * Update the specified Councils in storage.
     * PUT/PATCH /councils/{id}
     *
     * @param int $id
     * @param UpdateCouncilsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCouncilsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Councils $councils */
        $councils = $this->councilsRepository->find($id);

        if (empty($councils)) {
            return $this->sendError('Councils not found');
        }

        $councils = $this->councilsRepository->update($input, $id);

        return $this->sendResponse(new CouncilsResource($councils), 'Councils updated successfully');
    }

    /**
     * Remove the specified Councils from storage.
     * DELETE /councils/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Councils $councils */
        $councils = $this->councilsRepository->find($id);

        if (empty($councils)) {
            return $this->sendError('Councils not found');
        }

        $councils->delete();

        return $this->sendSuccess('Councils deleted successfully');
    }
}
