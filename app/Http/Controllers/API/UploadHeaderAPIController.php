<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUploadHeaderAPIRequest;
use App\Http\Requests\API\UpdateUploadHeaderAPIRequest;
use App\UploadHeader;
use App\Repositories\UploadHeaderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UploadHeaderResource;
use Response;

/**
 * Class UploadHeaderController
 * @package App\Http\Controllers\API
 */

class UploadHeaderAPIController extends AppBaseController
{
    /** @var  UploadHeaderRepository */
    private $uploadHeaderRepository;

    public function __construct(UploadHeaderRepository $uploadHeaderRepo)
    {
        $this->uploadHeaderRepository = $uploadHeaderRepo;
    }

    /**
     * Display a listing of the UploadHeader.
     * GET|HEAD /uploadHeaders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $uploadHeaders = $this->uploadHeaderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UploadHeaderResource::collection($uploadHeaders), 'Upload Headers retrieved successfully');
    }

    /**
     * Store a newly created UploadHeader in storage.
     * POST /uploadHeaders
     *
     * @param CreateUploadHeaderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUploadHeaderAPIRequest $request)
    {
        $input = $request->all();

        $uploadHeader = $this->uploadHeaderRepository->create($input);

        return $this->sendResponse(new UploadHeaderResource($uploadHeader), 'Upload Header saved successfully');
    }

    /**
     * Display the specified UploadHeader.
     * GET|HEAD /uploadHeaders/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UploadHeader $uploadHeader */
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            return $this->sendError('Upload Header not found');
        }

        return $this->sendResponse(new UploadHeaderResource($uploadHeader), 'Upload Header retrieved successfully');
    }

    /**
     * Update the specified UploadHeader in storage.
     * PUT/PATCH /uploadHeaders/{id}
     *
     * @param int $id
     * @param UpdateUploadHeaderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUploadHeaderAPIRequest $request)
    {
        $input = $request->all();

        /** @var UploadHeader $uploadHeader */
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            return $this->sendError('Upload Header not found');
        }

        $uploadHeader = $this->uploadHeaderRepository->update($input, $id);

        return $this->sendResponse(new UploadHeaderResource($uploadHeader), 'UploadHeader updated successfully');
    }

    /**
     * Remove the specified UploadHeader from storage.
     * DELETE /uploadHeaders/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UploadHeader $uploadHeader */
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            return $this->sendError('Upload Header not found');
        }

        $uploadHeader->delete();

        return $this->sendSuccess('Upload Header deleted successfully');
    }
}
