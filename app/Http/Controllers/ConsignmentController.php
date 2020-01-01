<?php

namespace App\Http\Controllers;

use App\DataTables\ConsignmentDataTable;
use App\Http\Requests\CreateConsignmentRequest;
use App\Http\Requests\UpdateConsignmentRequest;
use App\Repositories\ConsignmentRepository;
use Flash;
use Response;

class ConsignmentController extends AppBaseController
{
    /** @var  ConsignmentRepository */
    private $consignmentRepository;

    public function __construct(ConsignmentRepository $consignmentRepo)
    {
        $this->consignmentRepository = $consignmentRepo;
    }

    /**
     * Display a listing of the Consignment.
     *
     * @param ConsignmentDataTable $consignmentDataTable
     * @return Response
     */
    public function index(ConsignmentDataTable $consignmentDataTable)
    {
        return $consignmentDataTable->render('consignments.index');
    }

    /**
     * Show the form for creating a new Consignment.
     *
     * @return Response
     */
    public function create()
    {
        return view('consignments.create');
    }

    /**
     * Store a newly created Consignment in storage.
     *
     * @param CreateConsignmentRequest $request
     *
     * @return Response
     */
    public function store(CreateConsignmentRequest $request)
    {
        $input = $request->all();

        $consignment = $this->consignmentRepository->create($input);

        Flash::success('Consignment saved successfully.');

        return redirect(route('consignments.index'));
    }

    /**
     * Display the specified Consignment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            Flash::error('Consignment not found');

            return redirect(route('consignments.index'));
        }

        return view('consignments.show')->with('consignment', $consignment);
    }

    /**
     * Show the form for editing the specified Consignment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            Flash::error('Consignment not found');

            return redirect(route('consignments.index'));
        }

        return view('consignments.edit')->with('consignment', $consignment);
    }

    /**
     * Update the specified Consignment in storage.
     *
     * @param  int              $id
     * @param UpdateConsignmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsignmentRequest $request)
    {
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            Flash::error('Consignment not found');

            return redirect(route('consignments.index'));
        }

        $consignment = $this->consignmentRepository->update($request->all(), $id);

        Flash::success('Consignment updated successfully.');

        return redirect(route('consignments.index'));
    }

    /**
     * Remove the specified Consignment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            Flash::error('Consignment not found');

            return redirect(route('consignments.index'));
        }

        $this->consignmentRepository->delete($id);

        Flash::success('Consignment deleted successfully.');

        return redirect(route('consignments.index'));
    }
}
