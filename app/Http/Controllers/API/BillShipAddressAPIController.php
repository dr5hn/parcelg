<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateBillShipAddressAPIRequest;
use App\Http\Requests\API\UpdateBillShipAddressAPIRequest;
use App\Models\BillShipAddress;
use App\Repositories\BillShipAddressRepository;
use Illuminate\Http\Request;
use Response;

/**
 * Class BillShipAddressController
 * @package App\Http\Controllers\API
 */

class BillShipAddressAPIController extends AppBaseController
{
    /** @var  BillShipAddressRepository */
    private $billShipAddressRepository;

    public function __construct(BillShipAddressRepository $billShipAddressRepo)
    {
        $this->billShipAddressRepository = $billShipAddressRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/billShipAddresses",
     *      summary="Get a listing of the BillShipAddresses.",
     *      tags={"BillShipAddress"},
     *      description="Get all BillShipAddresses",
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
     *                  @SWG\Items(ref="#/definitions/BillShipAddress")
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
        $billShipAddresses = $this->billShipAddressRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($billShipAddresses->toArray(), 'Bill Ship Addresses retrieved successfully');
    }

    /**
     * @param CreateBillShipAddressAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/billShipAddresses",
     *      summary="Store a newly created BillShipAddress in storage",
     *      tags={"BillShipAddress"},
     *      description="Store BillShipAddress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BillShipAddress that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BillShipAddress")
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
     *                  ref="#/definitions/BillShipAddress"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBillShipAddressAPIRequest $request)
    {
        $input = $request->all();

        $billShipAddress = $this->billShipAddressRepository->create($input);

        return $this->sendResponse($billShipAddress->toArray(), 'Bill Ship Address saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/billShipAddresses/{id}",
     *      summary="Display the specified BillShipAddress",
     *      tags={"BillShipAddress"},
     *      description="Get BillShipAddress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BillShipAddress",
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
     *                  ref="#/definitions/BillShipAddress"
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
        /** @var BillShipAddress $billShipAddress */
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            return $this->sendError('Bill Ship Address not found');
        }

        return $this->sendResponse($billShipAddress->toArray(), 'Bill Ship Address retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBillShipAddressAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/billShipAddresses/{id}",
     *      summary="Update the specified BillShipAddress in storage",
     *      tags={"BillShipAddress"},
     *      description="Update BillShipAddress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BillShipAddress",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BillShipAddress that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BillShipAddress")
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
     *                  ref="#/definitions/BillShipAddress"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBillShipAddressAPIRequest $request)
    {
        $input = $request->all();

        /** @var BillShipAddress $billShipAddress */
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            return $this->sendError('Bill Ship Address not found');
        }

        $billShipAddress = $this->billShipAddressRepository->update($input, $id);

        return $this->sendResponse($billShipAddress->toArray(), 'BillShipAddress updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/billShipAddresses/{id}",
     *      summary="Remove the specified BillShipAddress from storage",
     *      tags={"BillShipAddress"},
     *      description="Delete BillShipAddress",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BillShipAddress",
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
        /** @var BillShipAddress $billShipAddress */
        $billShipAddress = $this->billShipAddressRepository->find($id);

        if (empty($billShipAddress)) {
            return $this->sendError('Bill Ship Address not found');
        }

        $billShipAddress->delete();

        return $this->sendResponse($id, 'Bill Ship Address deleted successfully');
    }
}
