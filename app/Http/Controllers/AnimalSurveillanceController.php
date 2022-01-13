<?php

namespace App\Http\Controllers;

use App\DataTables\AnimalSurveillanceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnimalSurveillanceRequest;
use App\Http\Requests\UpdateAnimalSurveillanceRequest;
use App\Repositories\AnimalSurveillanceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AnimalSurveillanceController extends AppBaseController
{
    /** @var  AnimalSurveillanceRepository */
    private $animalSurveillanceRepository;

    public function __construct(AnimalSurveillanceRepository $animalSurveillanceRepo)
    {
        $this->animalSurveillanceRepository = $animalSurveillanceRepo;
    }

    /**
     * Display a listing of the AnimalSurveillance.
     *
     * @param AnimalSurveillanceDataTable $animalSurveillanceDataTable
     * @return Response
     */
    public function index(AnimalSurveillanceDataTable $animalSurveillanceDataTable)
    {
        return $animalSurveillanceDataTable->render('animal_surveillances.index');
    }

    /**
     * Show the form for creating a new AnimalSurveillance.
     *
     * @return Response
     */
    public function create()
    {
        return view('animal_surveillances.create');
    }

    /**
     * Store a newly created AnimalSurveillance in storage.
     *
     * @param CreateAnimalSurveillanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAnimalSurveillanceRequest $request)
    {
        $input = $request->all();

        $animalSurveillance = $this->animalSurveillanceRepository->create($input);

        Flash::success('Animal Surveillance saved successfully.');

        return redirect(route('animalSurveillances.index'));
    }

    /**
     * Display the specified AnimalSurveillance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            Flash::error('Animal Surveillance not found');

            return redirect(route('animalSurveillances.index'));
        }

        return view('animal_surveillances.show')->with('animalSurveillance', $animalSurveillance);
    }

    /**
     * Show the form for editing the specified AnimalSurveillance.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            Flash::error('Animal Surveillance not found');

            return redirect(route('animalSurveillances.index'));
        }

        return view('animal_surveillances.edit')->with('animalSurveillance', $animalSurveillance);
    }

    /**
     * Update the specified AnimalSurveillance in storage.
     *
     * @param  int              $id
     * @param UpdateAnimalSurveillanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnimalSurveillanceRequest $request)
    {
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            Flash::error('Animal Surveillance not found');

            return redirect(route('animalSurveillances.index'));
        }

        $animalSurveillance = $this->animalSurveillanceRepository->update($request->all(), $id);

        Flash::success('Animal Surveillance updated successfully.');

        return redirect(route('animalSurveillances.index'));
    }

    /**
     * Remove the specified AnimalSurveillance from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $animalSurveillance = $this->animalSurveillanceRepository->find($id);

        if (empty($animalSurveillance)) {
            Flash::error('Animal Surveillance not found');

            return redirect(route('animalSurveillances.index'));
        }

        $this->animalSurveillanceRepository->delete($id);

        Flash::success('Animal Surveillance deleted successfully.');

        return redirect(route('animalSurveillances.index'));
    }
}
