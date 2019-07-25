<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCourierProviderAPIRequest;
use App\Http\Requests\API\UpdateCourierProviderAPIRequest;
use App\Models\CourierProvider;
use App\Repositories\CourierProviderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CourierProviderController
 * @package App\Http\Controllers\API
 */

class CourierProviderAPIController extends AppBaseController
{
    /** @var  CourierProviderRepository */
    private $courierProviderRepository;

    public function __construct(CourierProviderRepository $courierProviderRepo)
    {
        $this->courierProviderRepository = $courierProviderRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/courierProviders",
     *      summary="Get a listing of the CourierProviders.",
     *      tags={"CourierProvider"},
     *      description="Get all CourierProviders",
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
     *                  @SWG\Items(ref="#/definitions/CourierProvider")
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
        $courierProviders = $this->courierProviderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($courierProviders->toArray(), 'Courier Providers retrieved successfully');
    }

    /**
     * @param CreateCourierProviderAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/courierProviders",
     *      summary="Store a newly created CourierProvider in storage",
     *      tags={"CourierProvider"},
     *      description="Store CourierProvider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CourierProvider that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CourierProvider")
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
     *                  ref="#/definitions/CourierProvider"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateCourierProviderAPIRequest $request)
    {
        $input = $request->all();

        $courierProvider = $this->courierProviderRepository->create($input);

        return $this->sendResponse($courierProvider->toArray(), 'Courier Provider saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/courierProviders/{id}",
     *      summary="Display the specified CourierProvider",
     *      tags={"CourierProvider"},
     *      description="Get CourierProvider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CourierProvider",
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
     *                  ref="#/definitions/CourierProvider"
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
        /** @var CourierProvider $courierProvider */
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            return $this->sendError('Courier Provider not found');
        }

        return $this->sendResponse($courierProvider->toArray(), 'Courier Provider retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateCourierProviderAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/courierProviders/{id}",
     *      summary="Update the specified CourierProvider in storage",
     *      tags={"CourierProvider"},
     *      description="Update CourierProvider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CourierProvider",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="CourierProvider that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/CourierProvider")
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
     *                  ref="#/definitions/CourierProvider"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateCourierProviderAPIRequest $request)
    {
        $input = $request->all();

        /** @var CourierProvider $courierProvider */
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            return $this->sendError('Courier Provider not found');
        }

        $courierProvider = $this->courierProviderRepository->update($input, $id);

        return $this->sendResponse($courierProvider->toArray(), 'CourierProvider updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/courierProviders/{id}",
     *      summary="Remove the specified CourierProvider from storage",
     *      tags={"CourierProvider"},
     *      description="Delete CourierProvider",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of CourierProvider",
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
        /** @var CourierProvider $courierProvider */
        $courierProvider = $this->courierProviderRepository->find($id);

        if (empty($courierProvider)) {
            return $this->sendError('Courier Provider not found');
        }

        $courierProvider->delete();

        return $this->sendResponse($id, 'Courier Provider deleted successfully');
    }
}
