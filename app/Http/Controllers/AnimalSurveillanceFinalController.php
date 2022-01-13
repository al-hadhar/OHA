<?php

namespace App\Http\Controllers;

use App\DataTables\AnimalSurveillanceFinalDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAnimalSurveillanceFinalRequest;
use App\Http\Requests\UpdateAnimalSurveillanceFinalRequest;
use App\Repositories\AnimalSurveillanceFinalRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AnimalSurveillanceFinalController extends AppBaseController
{
    /** @var  AnimalSurveillanceFinalRepository */
    private $animalSurveillanceFinalRepository;

    public function __construct(AnimalSurveillanceFinalRepository $animalSurveillanceFinalRepo)
    {
        $this->animalSurveillanceFinalRepository = $animalSurveillanceFinalRepo;
    }

    /**
     * Display a listing of the AnimalSurveillanceFinal.
     *
     * @param AnimalSurveillanceFinalDataTable $animalSurveillanceFinalDataTable
     * @return Response
     */
    public function index(AnimalSurveillanceFinalDataTable $animalSurveillanceFinalDataTable)
    {
        return $animalSurveillanceFinalDataTable->render('animal_surveillance_finals.index');
    }

    /**
     * Show the form for creating a new AnimalSurveillanceFinal.
     *
     * @return Response
     */
    public function create()
    {
        return view('animal_surveillance_finals.create');
    }

    /**
     * Store a newly created AnimalSurveillanceFinal in storage.
     *
     * @param CreateAnimalSurveillanceFinalRequest $request
     *
     * @return Response
     */
    public function store(CreateAnimalSurveillanceFinalRequest $request)
    {
        $input = $request->all();

        $animalSurveillanceFinal = $this->animalSurveillanceFinalRepository->create($input);

        Flash::success('Animal Surveillance Final saved successfully.');

        return redirect(route('animalSurveillanceFinals.index'));
    }

    /**
     * Display the specified AnimalSurveillanceFinal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $animalSurveillanceFinal = $this->animalSurveillanceFinalRepository->find($id);

        if (empty($animalSurveillanceFinal)) {
            Flash::error('Animal Surveillance Final not found');

            return redirect(route('animalSurveillanceFinals.index'));
        }

        return view('animal_surveillance_finals.show')->with('animalSurveillanceFinal', $animalSurveillanceFinal);
    }

    /**
     * Show the form for editing the specified AnimalSurveillanceFinal.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $animalSurveillanceFinal = $this->animalSurveillanceFinalRepository->find($id);

        if (empty($animalSurveillanceFinal)) {
            Flash::error('Animal Surveillance Final not found');

            return redirect(route('animalSurveillanceFinals.index'));
        }

        return view('animal_surveillance_finals.edit')->with('animalSurveillanceFinal', $animalSurveillanceFinal);
    }

    /**
     * Update the specified AnimalSurveillanceFinal in storage.
     *
     * @param  int              $id
     * @param UpdateAnimalSurveillanceFinalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAnimalSurveillanceFinalRequest $request)
    {
        $animalSurveillanceFinal = $this->animalSurveillanceFinalRepository->find($id);

        if (empty($animalSurveillanceFinal)) {
            Flash::error('Animal Surveillance Final not found');

            return redirect(route('animalSurveillanceFinals.index'));
        }

        $animalSurveillanceFinal = $this->animalSurveillanceFinalRepository->update($request->all(), $id);

        Flash::success('Animal Surveillance Final updated successfully.');

        return redirect(route('animalSurveillanceFinals.index'));
    }

    /**
     * Remove the specified AnimalSurveillanceFinal from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $animalSurveillanceFinal = $this->animalSurveillanceFinalRepository->find($id);

        if (empty($animalSurveillanceFinal)) {
            Flash::error('Animal Surveillance Final not found');

            return redirect(route('animalSurveillanceFinals.index'));
        }

        $this->animalSurveillanceFinalRepository->delete($id);

        Flash::success('Animal Surveillance Final deleted successfully.');

        return redirect(route('animalSurveillanceFinals.index'));
    }
}
