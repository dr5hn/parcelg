<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNotificationsAPIRequest;
use App\Http\Requests\API\UpdateNotificationsAPIRequest;
use App\Models\Notifications;
use App\Repositories\NotificationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NotificationsController
 * @package App\Http\Controllers\API
 */

class NotificationsAPIController extends AppBaseController
{
    /** @var  NotificationsRepository */
    private $notificationsRepository;

    public function __construct(NotificationsRepository $notificationsRepo)
    {
        $this->notificationsRepository = $notificationsRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/notifications",
     *      summary="Get a listing of the Notifications.",
     *      tags={"Notifications"},
     *      description="Get all Notifications",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Notifications")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $notifications = $this->notificationsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($notifications->toArray(), 'Notifications retrieved successfully');
    }

    /**
     * @param CreateNotificationsAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/notifications",
     *      summary="Store a newly created Notifications in storage",
     *      tags={"Notifications"},
     *      description="Store Notifications",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Notifications that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Notifications")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Notifications"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateNotificationsAPIRequest $request)
    {
        $input = $request->all();

        $notifications = $this->notificationsRepository->create($input);

        return $this->sendResponse($notifications->toArray(), 'Notifications saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/notifications/{id}",
     *      summary="Display the specified Notifications",
     *      tags={"Notifications"},
     *      description="Get Notifications",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Notifications",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Notifications"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Notifications $notifications */
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            return $this->sendError('Notifications not found');
        }

        return $this->sendResponse($notifications->toArray(), 'Notifications retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateNotificationsAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/notifications/{id}",
     *      summary="Update the specified Notifications in storage",
     *      tags={"Notifications"},
     *      description="Update Notifications",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Notifications",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Notifications that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Notifications")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Notifications"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateNotificationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var Notifications $notifications */
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            return $this->sendError('Notifications not found');
        }

        $notifications = $this->notificationsRepository->update($input, $id);

        return $this->sendResponse($notifications->toArray(), 'Notifications updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/notifications/{id}",
     *      summary="Remove the specified Notifications from storage",
     *      tags={"Notifications"},
     *      description="Delete Notifications",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Notifications",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Notifications $notifications */
        $notifications = $this->notificationsRepository->find($id);

        if (empty($notifications)) {
            return $this->sendError('Notifications not found');
        }

        $notifications->delete();

        return $this->sendResponse($id, 'Notifications deleted successfully');
    }
}
