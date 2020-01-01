<?php

namespace App\Http\Controllers;

use App\DataTables\BillShipAddressDataTable;
use App\Http\Requests\CreateBillShipAddressRequest;
use App\Http\Requests\UpdateBillShipAddressRequest;
use App\Repositories\BillShipAddressRepository;
use Flash;
use Response;

class BillShipAddressController extends AppBaseController
{
    /** @var  BillShipAddressRepository */
    private $billShipAddressRepository;

    public function __construct(BillShipAddressRepository $billShipAddressRepo)
    {
        $this->billShipAddressRepository = $billShipAddressRepo;
    }

    /**
     * Display a listing of the BillShipAddress.
     *
     * @param BillShipAddressDataTable $billShipAddressDataTable
     * @return Response
     */
    public function index(BillShipAddressDataTable $billShipAddressDataTable)
    {
        return $billShipAddressDataTable->render('bill_ship_addresses.index');
    }

    /**
     * Show the form for creating a new BillShipAddress.
     *
     * @return Response
     */
    public function create()
    {
        return view('bill_ship_addresses.create');
    }

    /**
     * Store a newly created BillShipAddress in storage.
     *
     * @param CreateBillShipAddressRequest $request
     *
     * @return Response
     */
    public function store(CreateBillShipAddressRequest $request)
    {
        $input = $request->all();

        $billShipAddress = $this->billShipAddressRepository->create($input);

        Flash::success('Bill Ship Address saved successfully.');

        return redirect(route('billShipAddresses.index'));
    }

    /**
     * Display the specified BillShipAddress.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            Flash::error('Bill Ship Address not found');

            return redirect(route('billShipAddresses.index'));
        }

        return view('bill_ship_addresses.show')->with('billShipAddress', $billShipAddress);
    }

    /**
     * Show the form for editing the specified BillShipAddress.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            Flash::error('Bill Ship Address not found');

            return redirect(route('billShipAddresses.index'));
        }

        return view('bill_ship_addresses.edit')->with('billShipAddress', $billShipAddress);
    }

    /**
     * Update the specified BillShipAddress in storage.
     *
     * @param  int              $id
     * @param UpdateBillShipAddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBillShipAddressRequest $request)
    {
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            Flash::error('Bill Ship Address not found');

            return redirect(route('billShipAddresses.index'));
        }

        $billShipAddress = $this->billShipAddressRepository->update($request->all(), $id);

        Flash::success('Bill Ship Address updated successfully.');

        return redirect(route('billShipAddresses.index'));
    }

    /**
     * Remove the specified BillShipAddress from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            Flash::error('Bill Ship Address not found');

            return redirect(route('billShipAddresses.index'));
        }

        $this->billShipAddressRepository->delete($id);

        Flash::success('Bill Ship Address deleted successfully.');

        return redirect(route('billShipAddresses.index'));
    }
}
