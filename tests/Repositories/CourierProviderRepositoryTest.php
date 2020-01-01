<?php namespace Tests\Repositories;

use App\Models\CourierProvider;
use App\Repositories\CourierProviderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\ApiTestTrait;
use Tests\TestCase;
use Tests\Traits\MakeCourierProviderTrait;

class CourierProviderRepositoryTest extends TestCase
{
    use MakeCourierProviderTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CourierProviderRepository
     */
    protected $courierProviderRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->courierProviderRepo = \App::make(CourierProviderRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_courier_provider()
    {
        $courierProvider = $this->fakeCourierProviderData();
        $createdCourierProvider = $this->courierProviderRepo->create($courierProvider);
        $createdCourierProvider = $createdCourierProvider->toArray();
        $this->assertArrayHasKey('id', $createdCourierProvider);
        $this->assertNotNull($createdCourierProvider['id'], 'Created CourierProvider must have id specified');
        $this->assertNotNull(CourierProvider::find($createdCourierProvider['id']), 'CourierProvider with given id must be in DB');
        $this->assertModelData($courierProvider, $createdCourierProvider);
    }

    /**
     * @test read
     */
    public function test_read_courier_provider()
    {
        $courierProvider = $this->makeCourierProvider();
        $dbCourierProvider = $this->courierProviderRepo->find($courierProvider->id);
        $dbCourierProvider = $dbCourierProvider->toArray();
        $this->assertModelData($courierProvider->toArray(), $dbCourierProvider);
    }

    /**
     * @test update
     */
    public function test_update_courier_provider()
    {
        $courierProvider = $this->makeCourierProvider();
        $fakeCourierProvider = $this->fakeCourierProviderData();
        $updatedCourierProvider = $this->courierProviderRepo->update($fakeCourierProvider, $courierProvider->id);
        $this->assertModelData($fakeCourierProvider, $updatedCourierProvider->toArray());
        $dbCourierProvider = $this->courierProviderRepo->find($courierProvider->id);
        $this->assertModelData($fakeCourierProvider, $dbCourierProvider->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_courier_provider()
    {
        $courierProvider = $this->makeCourierProvider();
        $resp = $this->courierProviderRepo->delete($courierProvider->id);
        $this->assertTrue($resp);
        $this->assertNull(CourierProvider::find($courierProvider->id), 'CourierProvider should not exist in DB');
    }
}
