<?php

namespace App\Http\Controllers;

use App\DataTables\ConsignmentTypeDataTable;
use App\Http\Requests\CreateConsignmentTypeRequest;
use App\Http\Requests\UpdateConsignmentTypeRequest;
use App\Repositories\ConsignmentTypeRepository;
use Flash;
use Response;

class ConsignmentTypeController extends AppBaseController
{
    /** @var  ConsignmentTypeRepository */
    private $consignmentTypeRepository;

    public function __construct(ConsignmentTypeRepository $consignmentTypeRepo)
    {
        $this->consignmentTypeRepository = $consignmentTypeRepo;
    }

    /**
     * Display a listing of the ConsignmentType.
     *
     * @param ConsignmentTypeDataTable $consignmentTypeDataTable
     * @return Response
     */
    public function index(ConsignmentTypeDataTable $consignmentTypeDataTable)
    {
        return $consignmentTypeDataTable->render('consignment_types.index');
    }

    /**
     * Show the form for creating a new ConsignmentType.
     *
     * @return Response
     */
    public function create()
    {
        return view('consignment_types.create');
    }

    /**
     * Store a newly created ConsignmentType in storage.
     *
     * @param CreateConsignmentTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateConsignmentTypeRequest $request)
    {
        $input = $request->all();

        $consignmentType = $this->consignmentTypeRepository->create($input);

        Flash::success('Consignment Type saved successfully.');

        return redirect(route('consignmentTypes.index'));
    }

    /**
     * Display the specified ConsignmentType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $consignmentType = $this->consignmentTypeRepository->find($id);

        if (empty($consignmentType)) {
            Flash::error('Consignment Type not found');

            return redirect(route('consignmentTypes.index'));
        }

        return view('consignment_types.show')->with('consignmentType', $consignmentType);
    }

    /**
     * Show the form for editing the specified ConsignmentType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $consignmentType = $this->consignmentTypeRepository->find($id);

        if (empty($consignmentType)) {
            Flash::error('Consignment Type not found');

            return redirect(route('consignmentTypes.index'));
        }

        return view('consignment_types.edit')->with('consignmentType', $consignmentType);
    }

    /**
     * Update the specified ConsignmentType in storage.
     *
     * @param  int              $id
     * @param UpdateConsignmentTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConsignmentTypeRequest $request)
    {
        $consignmentType = $this->consignmentTypeRepository->find($id);

        if (empty($consignmentType)) {
            Flash::error('Consignment Type not found');

            return redirect(route('consignmentTypes.index'));
        }

        $consignmentType = $this->consignmentTypeRepository->update($request->all(), $id);

        Flash::success('Consignment Type updated successfully.');

        return redirect(route('consignmentTypes.index'));
    }

    /**
     * Remove the specified ConsignmentType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $consignmentType = $this->consignmentTypeRepository->find($id);

        if (empty($consignmentType)) {
            Flash::error('Consignment Type not found');

            return redirect(route('consignmentTypes.index'));
        }

        $this->consignmentTypeRepository->delete($id);

        Flash::success('Consignment Type deleted successfully.');

        return redirect(route('consignmentTypes.index'));
    }
}
