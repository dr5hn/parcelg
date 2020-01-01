<?php namespace Tests\Repositories;

use App\Models\BillShipAddress;
use App\Repositories\BillShipAddressRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ApiTestTrait;
use Tests\TestCase;
use Tests\Traits\MakeBillShipAddressTrait;

class BillShipAddressRepositoryTest extends TestCase
{
    use MakeBillShipAddressTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BillShipAddressRepository
     */
    protected $billShipAddressRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->billShipAddressRepo = \App::make(BillShipAddressRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bill_ship_address()
    {
        $billShipAddress = $this->fakeBillShipAddressData();
        $createdBillShipAddress = $this->billShipAddressRepo->create($billShipAddress);
        $createdBillShipAddress = $createdBillShipAddress->toArray();
        $this->assertArrayHasKey('id', $createdBillShipAddress);
        $this->assertNotNull($createdBillShipAddress['id'], 'Created BillShipAddress must have id specified');
        $this->assertNotNull(BillShipAddress::find($createdBillShipAddress['id']), 'BillShipAddress with given id must be in DB');
        $this->assertModelData($billShipAddress, $createdBillShipAddress);
    }

    /**
     * @test read
     */
    public function test_read_bill_ship_address()
    {
        $billShipAddress = $this->makeBillShipAddress();
        $dbBillShipAddress = $this->billShipAddressRepo->find($billShipAddress->id);
        $dbBillShipAddress = $dbBillShipAddress->toArray();
        $this->assertModelData($billShipAddress->toArray(), $dbBillShipAddress);
    }

    /**
     * @test update
     */
    public function test_update_bill_ship_address()
    {
        $billShipAddress = $this->makeBillShipAddress();
        $fakeBillShipAddress = $this->fakeBillShipAddressData();
        $updatedBillShipAddress = $this->billShipAddressRepo->update($fakeBillShipAddress, $billShipAddress->id);
        $this->assertModelData($fakeBillShipAddress, $updatedBillShipAddress->toArray());
        $dbBillShipAddress = $this->billShipAddressRepo->find($billShipAddress->id);
        $this->assertModelData($fakeBillShipAddress, $dbBillShipAddress->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bill_ship_address()
    {
        $billShipAddress = $this->makeBillShipAddress();
        $resp = $this->billShipAddressRepo->delete($billShipAddress->id);
        $this->assertTrue($resp);
        $this->assertNull(BillShipAddress::find($billShipAddress->id), 'BillShipAddress should not exist in DB');
    }
}
