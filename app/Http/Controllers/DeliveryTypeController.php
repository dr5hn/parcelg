<?php

namespace App\Http\Controllers;

use App\DataTables\DeliveryTypeDataTable;
use App\Http\Requests\CreateDeliveryTypeRequest;
use App\Http\Requests\UpdateDeliveryTypeRequest;
use App\Repositories\DeliveryTypeRepository;
use Flash;
use Response;

class DeliveryTypeController extends AppBaseController
{
    /** @var  DeliveryTypeRepository */
    private $deliveryTypeRepository;

    public function __construct(DeliveryTypeRepository $deliveryTypeRepo)
    {
        $this->deliveryTypeRepository = $deliveryTypeRepo;
    }

    /**
     * Display a listing of the DeliveryType.
     *
     * @param DeliveryTypeDataTable $deliveryTypeDataTable
     * @return Response
     */
    public function index(DeliveryTypeDataTable $deliveryTypeDataTable)
    {
        return $deliveryTypeDataTable->render('delivery_types.index');
    }

    /**
     * Show the form for creating a new DeliveryType.
     *
     * @return Response
     */
    public function create()
    {
        return view('delivery_types.create');
    }

    /**
     * Store a newly created DeliveryType in storage.
     *
     * @param CreateDeliveryTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateDeliveryTypeRequest $request)
    {
        $input = $request->all();

        $deliveryType = $this->deliveryTypeRepository->create($input);

        Flash::success('Delivery Type saved successfully.');

        return redirect(route('deliveryTypes.index'));
    }

    /**
     * Display the specified DeliveryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deliveryType = $this->deliveryTypeRepository->find($id);

        if (empty($deliveryType)) {
            Flash::error('Delivery Type not found');

            return redirect(route('deliveryTypes.index'));
        }

        return view('delivery_types.show')->with('deliveryType', $deliveryType);
    }

    /**
     * Show the form for editing the specified DeliveryType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deliveryType = $this->deliveryTypeRepository->find($id);

        if (empty($deliveryType)) {
            Flash::error('Delivery Type not found');

            return redirect(route('deliveryTypes.index'));
        }

        return view('delivery_types.edit')->with('deliveryType', $deliveryType);
    }

    /**
     * Update the specified DeliveryType in storage.
     *
     * @param  int              $id
     * @param UpdateDeliveryTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeliveryTypeRequest $request)
    {
        $deliveryType = $this->deliveryTypeRepository->find($id);

        if (empty($deliveryType)) {
            Flash::error('Delivery Type not found');

            return redirect(route('deliveryTypes.index'));
        }

        $deliveryType = $this->deliveryTypeRepository->update($request->all(), $id);

        Flash::success('Delivery Type updated successfully.');

        return redirect(route('deliveryTypes.index'));
    }

    /**
     * Remove the specified DeliveryType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deliveryType = $this->deliveryTypeRepository->find($id);

        if (empty($deliveryType)) {
            Flash::error('Delivery Type not found');

            return redirect(route('deliveryTypes.index'));
        }

        $this->deliveryTypeRepository->delete($id);

        Flash::success('Delivery Type deleted successfully.');

        return redirect(route('deliveryTypes.index'));
    }
}
