<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCourierProviderUsersAPIRequest;
use App\Http\Requests\API\UpdateCourierProviderUsersAPIRequest;
use App\Models\CourierProviderUsers;
use App\Repositories\CourierProviderUsersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CourierProviderUsersController
 * @package App\Http\Controllers\API
 */

class CourierProviderUsersAPIController extends AppBaseController
{
    /** @var  CourierProviderUsersRepository */
    private $courierProviderUsersRepository;

    public function __construct(CourierProviderUsersRepository $courierProviderUsersRepo)
    {
        $this->courierProviderUsersRepository = $courierProviderUsersRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/courierProviderUsers",
     *      summary="Get a listing of the CourierProviderUsers.",
     *      tags={"CourierProviderUsers"},
     *      description="Get all CourierProviderUsers",
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
     *                  @SWG\Items(ref="#/definitions/CourierProviderUsers")
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
        $courierProviderUsers = $this->courierProviderUsersRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($courierProviderUsers->toArray(), 'Courier Provider Users retrieved successfully');
    }

    /**
     * @param CreateCourierProviderUsersAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/courierProviderUsers",
     *      summary="Store a newly created CourierProviderUsers in storage",
     *      tags={"CourierProviderUsers"},
     *      description="Store CourierProviderUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CourierProviderUsers that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CourierProviderUsers")
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
     *                  ref="#/definitions/CourierProviderUsers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCourierProviderUsersAPIRequest $request)
    {
        $input = $request->all();

        $courierProviderUsers = $this->courierProviderUsersRepository->create($input);

        return $this->sendResponse($courierProviderUsers->toArray(), 'Courier Provider Users saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/courierProviderUsers/{id}",
     *      summary="Display the specified CourierProviderUsers",
     *      tags={"CourierProviderUsers"},
     *      description="Get CourierProviderUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CourierProviderUsers",
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
     *                  ref="#/definitions/CourierProviderUsers"
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
        /** @var CourierProviderUsers $courierProviderUsers */
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            return $this->sendError('Courier Provider Users not found');
        }

        return $this->sendResponse($courierProviderUsers->toArray(), 'Courier Provider Users retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCourierProviderUsersAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/courierProviderUsers/{id}",
     *      summary="Update the specified CourierProviderUsers in storage",
     *      tags={"CourierProviderUsers"},
     *      description="Update CourierProviderUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CourierProviderUsers",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CourierProviderUsers that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CourierProviderUsers")
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
     *                  ref="#/definitions/CourierProviderUsers"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCourierProviderUsersAPIRequest $request)
    {
        $input = $request->all();

        /** @var CourierProviderUsers $courierProviderUsers */
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            return $this->sendError('Courier Provider Users not found');
        }

        $courierProviderUsers = $this->courierProviderUsersRepository->update($input, $id);

        return $this->sendResponse($courierProviderUsers->toArray(), 'CourierProviderUsers updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/courierProviderUsers/{id}",
     *      summary="Remove the specified CourierProviderUsers from storage",
     *      tags={"CourierProviderUsers"},
     *      description="Delete CourierProviderUsers",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CourierProviderUsers",
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
        /** @var CourierProviderUsers $courierProviderUsers */
        $courierProviderUsers = $this->courierProviderUsersRepository->find($id);

        if (empty($courierProviderUsers)) {
            return $this->sendError('Courier Provider Users not found');
        }

        $courierProviderUsers->delete();

        return $this->sendResponse($id, 'Courier Provider Users deleted successfully');
    }
}
