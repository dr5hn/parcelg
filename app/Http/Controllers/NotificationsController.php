<?php

namespace App\Http\Controllers;

use App\DataTables\NotificationsDataTable;
use App\Http\Requests\CreateNotificationsRequest;
use App\Http\Requests\UpdateNotificationsRequest;
use App\Repositories\NotificationsRepository;
use Flash;
use Response;

class NotificationsController extends AppBaseController
{
    /** @var  NotificationsRepository */
    private $notificationsRepository;

    public function __construct(NotificationsRepository $notificationsRepo)
    {
        $this->notificationsRepository = $notificationsRepo;
    }

    /**
     * Display a listing of the Notifications.
     *
     * @param NotificationsDataTable $notificationsDataTable
     * @return Response
     */
    public function index(NotificationsDataTable $notificationsDataTable)
    {
        return $notificationsDataTable->render('notifications.index');
    }

    /**
     * Show the form for creating a new Notifications.
     *
     * @return Response
     */
    public function create()
    {
        return view('notifications.create');
    }

    /**
     * Store a newly created Notifications in storage.
     *
     * @param CreateNotificationsRequest $request
     *
     * @return Response
     */
    public function store(CreateNotificationsRequest $request)
    {
        $input = $request->all();

        $notifications = $this->notificationsRepository->create($input);

        Flash::success('Notifications saved successfully.');

        return redirect(route('notifications.index'));
    }

    /**
     * Display the specified Notifications.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        return view('notifications.show')->with('notifications', $notifications);
    }

    /**
     * Show the form for editing the specified Notifications.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        return view('notifications.edit')->with('notifications', $notifications);
    }

    /**
     * Update the specified Notifications in storage.
     *
     * @param  int              $id
     * @param UpdateNotificationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotificationsRequest $request)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        $notifications = $this->notificationsRepository->update($request->all(), $id);

        Flash::success('Notifications updated successfully.');

        return redirect(route('notifications.index'));
    }

    /**
     * Remove the specified Notifications from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            Flash::error('Notifications not found');

            return redirect(route('notifications.index'));
        }

        $this->notificationsRepository->delete($id);

        Flash::success('Notifications deleted successfully.');

        return redirect(route('notifications.index'));
    }
}
