<?php

namespace App\Http\Controllers;

use App\DataTables\CourierProviderUsersDataTable;
use App\Http\Requests\CreateCourierProviderUsersRequest;
use App\Http\Requests\UpdateCourierProviderUsersRequest;
use App\Repositories\CourierProviderUsersRepository;
use Flash;
use Response;

class CourierProviderUsersController extends AppBaseController
{
    /** @var  CourierProviderUsersRepository */
    private $courierProviderUsersRepository;

    public function __construct(CourierProviderUsersRepository $courierProviderUsersRepo)
    {
        $this->courierProviderUsersRepository = $courierProviderUsersRepo;
    }

    /**
     * Display a listing of the CourierProviderUsers.
     *
     * @param CourierProviderUsersDataTable $courierProviderUsersDataTable
     * @return Response
     */
    public function index(CourierProviderUsersDataTable $courierProviderUsersDataTable)
    {
        return $courierProviderUsersDataTable->render('courier_provider_users.index');
    }

    /**
     * Show the form for creating a new CourierProviderUsers.
     *
     * @return Response
     */
    public function create()
    {
        return view('courier_provider_users.create');
    }

    /**
     * Store a newly created CourierProviderUsers in storage.
     *
     * @param CreateCourierProviderUsersRequest $request
     *
     * @return Response
     */
    public function store(CreateCourierProviderUsersRequest $request)
    {
        $input = $request->all();

        $courierProviderUsers = $this->courierProviderUsersRepository->create($input);

        Flash::success('Courier Provider Users saved successfully.');

        return redirect(route('courierProviderUsers.index'));
    }

    /**
     * Display the specified CourierProviderUsers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            Flash::error('Courier Provider Users not found');

            return redirect(route('courierProviderUsers.index'));
        }

        return view('courier_provider_users.show')->with('courierProviderUsers', $courierProviderUsers);
    }

    /**
     * Show the form for editing the specified CourierProviderUsers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            Flash::error('Courier Provider Users not found');

            return redirect(route('courierProviderUsers.index'));
        }

        return view('courier_provider_users.edit')->with('courierProviderUsers', $courierProviderUsers);
    }

    /**
     * Update the specified CourierProviderUsers in storage.
     *
     * @param  int              $id
     * @param UpdateCourierProviderUsersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCourierProviderUsersRequest $request)
    {
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            Flash::error('Courier Provider Users not found');

            return redirect(route('courierProviderUsers.index'));
        }

        $courierProviderUsers = $this->courierProviderUsersRepository->update($request->all(), $id);

        Flash::success('Courier Provider Users updated successfully.');

        return redirect(route('courierProviderUsers.index'));
    }

    /**
     * Remove the specified CourierProviderUsers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            Flash::error('Courier Provider Users not found');

            return redirect(route('courierProviderUsers.index'));
        }

        $this->courierProviderUsersRepository->delete($id);

        Flash::success('Courier Provider Users deleted successfully.');

        return redirect(route('courierProviderUsers.index'));
    }
}
