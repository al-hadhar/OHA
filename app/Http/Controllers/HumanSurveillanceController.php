<?php

namespace App\Http\Controllers;

use App\DataTables\HumanSurveillanceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHumanSurveillanceRequest;
use App\Http\Requests\UpdateHumanSurveillanceRequest;
use App\Repositories\HumanSurveillanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HumanSurveillanceController extends AppBaseController
{
    /** @var  HumanSurveillanceRepository */
    private $humanSurveillanceRepository;

    public function __construct(HumanSurveillanceRepository $humanSurveillanceRepo)
    {
        $this->humanSurveillanceRepository = $humanSurveillanceRepo;
    }

    /**
     * Display a listing of the HumanSurveillance.
     *
     * @param HumanSurveillanceDataTable $humanSurveillanceDataTable
     * @return Response
     */
    public function index(HumanSurveillanceDataTable $humanSurveillanceDataTable)
    {
        return $humanSurveillanceDataTable->render('human_surveillances.index');
    }

    /**
     * Show the form for creating a new HumanSurveillance.
     *
     * @return Response
     */
    public function create()
    {
        return view('human_surveillances.create');
    }

    /**
     * Store a newly created HumanSurveillance in storage.
     *
     * @param CreateHumanSurveillanceRequest $request
     *
     * @return Response
     */
    public function store(CreateHumanSurveillanceRequest $request)
    {
        $input = $request->all();

        $humanSurveillance = $this->humanSurveillanceRepository->create($input);

        Flash::success('Human Surveillance saved successfully.');

        return redirect(route('humanSurveillances.index'));
    }

    /**
     * Display the specified HumanSurveillance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            Flash::error('Human Surveillance not found');

            return redirect(route('humanSurveillances.index'));
        }

        return view('human_surveillances.show')->with('humanSurveillance', $humanSurveillance);
    }

    /**
     * Show the form for editing the specified HumanSurveillance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            Flash::error('Human Surveillance not found');

            return redirect(route('humanSurveillances.index'));
        }

        return view('human_surveillances.edit')->with('humanSurveillance', $humanSurveillance);
    }

    /**
     * Update the specified HumanSurveillance in storage.
     *
     * @param  int              $id
     * @param UpdateHumanSurveillanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHumanSurveillanceRequest $request)
    {
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            Flash::error('Human Surveillance not found');

            return redirect(route('humanSurveillances.index'));
        }

        $humanSurveillance = $this->humanSurveillanceRepository->update($request->all(), $id);

        Flash::success('Human Surveillance updated successfully.');

        return redirect(route('humanSurveillances.index'));
    }

    /**
     * Remove the specified HumanSurveillance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $humanSurveillance = $this->humanSurveillanceRepository->find($id);

        if (empty($humanSurveillance)) {
            Flash::error('Human Surveillance not found');

            return redirect(route('humanSurveillances.index'));
        }

        $this->humanSurveillanceRepository->delete($id);

        Flash::success('Human Surveillance deleted successfully.');

        return redirect(route('humanSurveillances.index'));
    }
}
