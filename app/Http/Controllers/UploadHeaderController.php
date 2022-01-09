<?php

namespace App\Http\Controllers;

use App\DataTables\UploadHeaderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUploadHeaderRequest;
use App\Http\Requests\UpdateUploadHeaderRequest;
use App\Repositories\UploadHeaderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class UploadHeaderController extends AppBaseController
{
    /** @var  UploadHeaderRepository */
    private $uploadHeaderRepository;

    public function __construct(UploadHeaderRepository $uploadHeaderRepo)
    {
        $this->uploadHeaderRepository = $uploadHeaderRepo;
    }

    /**
     * Display a listing of the UploadHeader.
     *
     * @param UploadHeaderDataTable $uploadHeaderDataTable
     * @return Response
     */
    public function index(UploadHeaderDataTable $uploadHeaderDataTable)
    {
        return $uploadHeaderDataTable->render('upload_headers.index');
    }

    /**
     * Show the form for creating a new UploadHeader.
     *
     * @return Response
     */
    public function create()
    {
        return view('upload_headers.create');
    }

    /**
     * Store a newly created UploadHeader in storage.
     *
     * @param CreateUploadHeaderRequest $request
     *
     * @return Response
     */
    public function store(CreateUploadHeaderRequest $request)
    {
        $input = $request->all();

        $uploadHeader = $this->uploadHeaderRepository->create($input);

        Flash::success('Upload Header saved successfully.');

        return redirect(route('uploadHeaders.index'));
    }

    /**
     * Display the specified UploadHeader.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            Flash::error('Upload Header not found');

            return redirect(route('uploadHeaders.index'));
        }

        return view('upload_headers.show')->with('uploadHeader', $uploadHeader);
    }

    /**
     * Show the form for editing the specified UploadHeader.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            Flash::error('Upload Header not found');

            return redirect(route('uploadHeaders.index'));
        }

        return view('upload_headers.edit')->with('uploadHeader', $uploadHeader);
    }

    /**
     * Update the specified UploadHeader in storage.
     *
     * @param  int              $id
     * @param UpdateUploadHeaderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUploadHeaderRequest $request)
    {
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            Flash::error('Upload Header not found');

            return redirect(route('uploadHeaders.index'));
        }

        $uploadHeader = $this->uploadHeaderRepository->update($request->all(), $id);

        Flash::success('Upload Header updated successfully.');

        return redirect(route('uploadHeaders.index'));
    }

    /**
     * Remove the specified UploadHeader from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $uploadHeader = $this->uploadHeaderRepository->find($id);

        if (empty($uploadHeader)) {
            Flash::error('Upload Header not found');

            return redirect(route('uploadHeaders.index'));
        }

        $this->uploadHeaderRepository->delete($id);

        Flash::success('Upload Header deleted successfully.');

        return redirect(route('uploadHeaders.index'));
    }

    public function createUploadHeader(CreateUploadHeaderRequest $request){
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv|max:2048',
        ]);

        $fileName = time().'.'.$request->file->extension();

        $storedPath = $request->file->move(public_path('uploads/documents'), $fileName);
       // dd(public_path());

        $input = [
            'type' => $request->type,
            'file_name' => $fileName,
            'file_path' => 'uploads/documents/'.$fileName,
            'total_success' => 0,
            'total_failed' => 0,
            'status' => 0
        ];

        //dd($input);
        $uploadHeader = $this->uploadHeaderRepository->create($input);

        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
    }
}
