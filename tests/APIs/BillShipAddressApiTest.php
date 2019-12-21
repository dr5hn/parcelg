<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeBillShipAddressTrait;
use Tests\ApiTestTrait;

class BillShipAddressApiTest extends TestCase
{
    use MakeBillShipAddressTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bill_ship_address()
    {
        $billShipAddress = $this->fakeBillShipAddressData();
        $this->response = $this->json('POST', '/api/billShipAddresses', $billShipAddress);

        $this->assertApiResponse($billShipAddress);
    }

    /**
     * @test
     */
    public function test_read_bill_ship_address()
    {
        $billShipAddress = $this->makeBillShipAddress();
        $this->response = $this->json('GET', '/api/billShipAddresses/'.$billShipAddress->id);

        $this->assertApiResponse($billShipAddress->toArray());
    }

    /**
     * @test
     */
    public function test_update_bill_ship_address()
    {
        $billShipAddress = $this->makeBillShipAddress();
        $editedBillShipAddress = $this->fakeBillShipAddressData();

        $this->response = $this->json('PUT', '/api/billShipAddresses/'.$billShipAddress->id, $editedBillShipAddress);

        $this->assertApiResponse($editedBillShipAddress);
    }

    /**
     * @test
     */
    public function test_delete_bill_ship_address()
    {
        $billShipAddress = $this->makeBillShipAddress();
        $this->response = $this->json('DELETE', '/api/billShipAddresses/'.$billShipAddress->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/billShipAddresses/'.$billShipAddress->id);

        $this->response->assertStatus(404);
    }
}
