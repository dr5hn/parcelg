<?php

namespace App\Http\Controllers;

use App\DataTables\CourierProviderDataTable;
use App\Http\Requests\CreateCourierProviderRequest;
use App\Http\Requests\UpdateCourierProviderRequest;
use App\Repositories\CourierProviderRepository;
use Flash;
use Response;

class CourierProviderController extends AppBaseController
{
    /** @var  CourierProviderRepository */
    private $courierProviderRepository;

    public function __construct(CourierProviderRepository $courierProviderRepo)
    {
        $this->courierProviderRepository = $courierProviderRepo;
    }

    /**
     * Display a listing of the CourierProvider.
     *
     * @param CourierProviderDataTable $courierProviderDataTable
     * @return Response
     */
    public function index(CourierProviderDataTable $courierProviderDataTable)
    {
        return $courierProviderDataTable->render('courier_providers.index');
    }

    /**
     * Show the form for creating a new CourierProvider.
     *
     * @return Response
     */
    public function create()
    {
        return view('courier_providers.create');
    }

    /**
     * Store a newly created CourierProvider in storage.
     *
     * @param CreateCourierProviderRequest $request
     *
     * @return Response
     */
    public function store(CreateCourierProviderRequest $request)
    {
        $input = $request->all();

        $courierProvider = $this->courierProviderRepository->create($input);

        Flash::success('Courier Provider saved successfully.');

        return redirect(route('courierProviders.index'));
    }

    /**
     * Display the specified CourierProvider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            Flash::error('Courier Provider not found');

            return redirect(route('courierProviders.index'));
        }

        return view('courier_providers.show')->with('courierProvider', $courierProvider);
    }

    /**
     * Show the form for editing the specified CourierProvider.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            Flash::error('Courier Provider not found');

            return redirect(route('courierProviders.index'));
        }

        return view('courier_providers.edit')->with('courierProvider', $courierProvider);
    }

    /**
     * Update the specified CourierProvider in storage.
     *
     * @param  int              $id
     * @param UpdateCourierProviderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourierProviderRequest $request)
    {
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            Flash::error('Courier Provider not found');

            return redirect(route('courierProviders.index'));
        }

        $courierProvider = $this->courierProviderRepository->update($request->all(), $id);

        Flash::success('Courier Provider updated successfully.');

        return redirect(route('courierProviders.index'));
    }

    /**
     * Remove the specified CourierProvider from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            Flash::error('Courier Provider not found');

            return redirect(route('courierProviders.index'));
        }

        $this->courierProviderRepository->delete($id);

        Flash::success('Courier Provider deleted successfully.');

        return redirect(route('courierProviders.index'));
    }
}
