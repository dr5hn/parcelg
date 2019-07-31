<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateConsignmentAPIRequest;
use App\Http\Requests\API\UpdateConsignmentAPIRequest;
use App\Models\Consignment;
use App\Repositories\ConsignmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ConsignmentController
 * @package App\Http\Controllers\API
 */

class ConsignmentAPIController extends AppBaseController
{
    /** @var  ConsignmentRepository */
    private $consignmentRepository;

    public function __construct(ConsignmentRepository $consignmentRepo)
    {
        $this->consignmentRepository = $consignmentRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/consignments",
     *      summary="Get a listing of the Consignments.",
     *      tags={"Consignment"},
     *      description="Get all Consignments",
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
     *                  @SWG\Items(ref="#/definitions/Consignment")
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
        $consignments = $this->consignmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($consignments->toArray(), 'Consignments retrieved successfully');
    }

    /**
     * @param CreateConsignmentAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/consignments",
     *      summary="Store a newly created Consignment in storage",
     *      tags={"Consignment"},
     *      description="Store Consignment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Consignment that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Consignment")
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
     *                  ref="#/definitions/Consignment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateConsignmentAPIRequest $request)
    {
        $input = $request->all();

        $consignment = $this->consignmentRepository->create($input);

        return $this->sendResponse($consignment->toArray(), 'Consignment saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/consignments/{id}",
     *      summary="Display the specified Consignment",
     *      tags={"Consignment"},
     *      description="Get Consignment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Consignment",
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
     *                  ref="#/definitions/Consignment"
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
        /** @var Consignment $consignment */
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            return $this->sendError('Consignment not found');
        }

        return $this->sendResponse($consignment->toArray(), 'Consignment retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateConsignmentAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/consignments/{id}",
     *      summary="Update the specified Consignment in storage",
     *      tags={"Consignment"},
     *      description="Update Consignment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Consignment",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Consignment that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Consignment")
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
     *                  ref="#/definitions/Consignment"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateConsignmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Consignment $consignment */
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            return $this->sendError('Consignment not found');
        }

        $consignment = $this->consignmentRepository->update($input, $id);

        return $this->sendResponse($consignment->toArray(), 'Consignment updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/consignments/{id}",
     *      summary="Remove the specified Consignment from storage",
     *      tags={"Consignment"},
     *      description="Delete Consignment",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Consignment",
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
        /** @var Consignment $consignment */
        $consignment = $this->consignmentRepository->find($id);

        if (empty($consignment)) {
            return $this->sendError('Consignment not found');
        }

        $consignment->delete();

        return $this->sendResponse($id, 'Consignment deleted successfully');
    }
}
