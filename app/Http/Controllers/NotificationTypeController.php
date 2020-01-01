<?php

namespace App\Http\Controllers;

use App\DataTables\NotificationTypeDataTable;
use App\Http\Requests\CreateNotificationTypeRequest;
use App\Http\Requests\UpdateNotificationTypeRequest;
use App\Repositories\NotificationTypeRepository;
use Flash;
use Response;

class NotificationTypeController extends AppBaseController
{
    /** @var  NotificationTypeRepository */
    private $notificationTypeRepository;

    public function __construct(NotificationTypeRepository $notificationTypeRepo)
    {
        $this->notificationTypeRepository = $notificationTypeRepo;
    }

    /**
     * Display a listing of the NotificationType.
     *
     * @param NotificationTypeDataTable $notificationTypeDataTable
     * @return Response
     */
    public function index(NotificationTypeDataTable $notificationTypeDataTable)
    {
        return $notificationTypeDataTable->render('notification_types.index');
    }

    /**
     * Show the form for creating a new NotificationType.
     *
     * @return Response
     */
    public function create()
    {
        return view('notification_types.create');
    }

    /**
     * Store a newly created NotificationType in storage.
     *
     * @param CreateNotificationTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateNotificationTypeRequest $request)
    {
        $input = $request->all();

        $notificationType = $this->notificationTypeRepository->create($input);

        Flash::success('Notification Type saved successfully.');

        return redirect(route('notificationTypes.index'));
    }

    /**
     * Display the specified NotificationType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notificationType = $this->notificationTypeRepository->find($id);

        if (empty($notificationType)) {
            Flash::error('Notification Type not found');

            return redirect(route('notificationTypes.index'));
        }

        return view('notification_types.show')->with('notificationType', $notificationType);
    }

    /**
     * Show the form for editing the specified NotificationType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $notificationType = $this->notificationTypeRepository->find($id);

        if (empty($notificationType)) {
            Flash::error('Notification Type not found');

            return redirect(route('notificationTypes.index'));
        }

        return view('notification_types.edit')->with('notificationType', $notificationType);
    }

    /**
     * Update the specified NotificationType in storage.
     *
     * @param  int              $id
     * @param UpdateNotificationTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotificationTypeRequest $request)
    {
        $notificationType = $this->notificationTypeRepository->find($id);

        if (empty($notificationType)) {
            Flash::error('Notification Type not found');

            return redirect(route('notificationTypes.index'));
        }

        $notificationType = $this->notificationTypeRepository->update($request->all(), $id);

        Flash::success('Notification Type updated successfully.');

        return redirect(route('notificationTypes.index'));
    }

    /**
     * Remove the specified NotificationType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notificationType = $this->notificationTypeRepository->find($id);

        if (empty($notificationType)) {
            Flash::error('Notification Type not found');

            return redirect(route('notificationTypes.index'));
        }

        $this->notificationTypeRepository->delete($id);

        Flash::success('Notification Type deleted successfully.');

        return redirect(route('notificationTypes.index'));
    }
}
