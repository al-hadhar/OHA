<?php

namespace App\Http\Controllers;

use App\DataTables\HumanSurveillanceFinalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHumanSurveillanceFinalRequest;
use App\Http\Requests\UpdateHumanSurveillanceFinalRequest;
use App\Repositories\HumanSurveillanceFinalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HumanSurveillanceFinalController extends AppBaseController
{
    /** @var  HumanSurveillanceFinalRepository */
    private $humanSurveillanceFinalRepository;

    public function __construct(HumanSurveillanceFinalRepository $humanSurveillanceFinalRepo)
    {
        $this->humanSurveillanceFinalRepository = $humanSurveillanceFinalRepo;
    }

    /**
     * Display a listing of the HumanSurveillanceFinal.
     *
     * @param HumanSurveillanceFinalDataTable $humanSurveillanceFinalDataTable
     * @return Response
     */
    public function index(HumanSurveillanceFinalDataTable $humanSurveillanceFinalDataTable)
    {
        return $humanSurveillanceFinalDataTable->render('human_surveillance_finals.index');
    }

    /**
     * Show the form for creating a new HumanSurveillanceFinal.
     *
     * @return Response
     */
    public function create()
    {
        return view('human_surveillance_finals.create');
    }

    /**
     * Store a newly created HumanSurveillanceFinal in storage.
     *
     * @param CreateHumanSurveillanceFinalRequest $request
     *
     * @return Response
     */
    public function store(CreateHumanSurveillanceFinalRequest $request)
    {
        $input = $request->all();

        $humanSurveillanceFinal = $this->humanSurveillanceFinalRepository->create($input);

        Flash::success('Human Surveillance Final saved successfully.');

        return redirect(route('humanSurveillanceFinals.index'));
    }

    /**
     * Display the specified HumanSurveillanceFinal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $humanSurveillanceFinal = $this->humanSurveillanceFinalRepository->find($id);

        if (empty($humanSurveillanceFinal)) {
            Flash::error('Human Surveillance Final not found');

            return redirect(route('humanSurveillanceFinals.index'));
        }

        return view('human_surveillance_finals.show')->with('humanSurveillanceFinal', $humanSurveillanceFinal);
    }

    /**
     * Show the form for editing the specified HumanSurveillanceFinal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $humanSurveillanceFinal = $this->humanSurveillanceFinalRepository->find($id);

        if (empty($humanSurveillanceFinal)) {
            Flash::error('Human Surveillance Final not found');

            return redirect(route('humanSurveillanceFinals.index'));
        }

        return view('human_surveillance_finals.edit')->with('humanSurveillanceFinal', $humanSurveillanceFinal);
    }

    /**
     * Update the specified HumanSurveillanceFinal in storage.
     *
     * @param  int              $id
     * @param UpdateHumanSurveillanceFinalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHumanSurveillanceFinalRequest $request)
    {
        $humanSurveillanceFinal = $this->humanSurveillanceFinalRepository->find($id);

        if (empty($humanSurveillanceFinal)) {
            Flash::error('Human Surveillance Final not found');

            return redirect(route('humanSurveillanceFinals.index'));
        }

        $humanSurveillanceFinal = $this->humanSurveillanceFinalRepository->update($request->all(), $id);

        Flash::success('Human Surveillance Final updated successfully.');

        return redirect(route('humanSurveillanceFinals.index'));
    }

    /**
     * Remove the specified HumanSurveillanceFinal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $humanSurveillanceFinal = $this->humanSurveillanceFinalRepository->find($id);

        if (empty($humanSurveillanceFinal)) {
            Flash::error('Human Surveillance Final not found');

            return redirect(route('humanSurveillanceFinals.index'));
        }

        $this->humanSurveillanceFinalRepository->delete($id);

        Flash::success('Human Surveillance Final deleted successfully.');

        return redirect(route('humanSurveillanceFinals.index'));
    }
}
