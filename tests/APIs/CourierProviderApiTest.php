<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeCourierProviderTrait;
use Tests\ApiTestTrait;

class CourierProviderApiTest extends TestCase
{
    use MakeCourierProviderTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_courier_provider()
    {
        $courierProvider = $this->fakeCourierProviderData();
        $this->response = $this->json('POST', '/api/courierProviders', $courierProvider);

        $this->assertApiResponse($courierProvider);
    }

    /**
     * @test
     */
    public function test_read_courier_provider()
    {
        $courierProvider = $this->makeCourierProvider();
        $this->response = $this->json('GET', '/api/courierProviders/'.$courierProvider->id);

        $this->assertApiResponse($courierProvider->toArray());
    }

    /**
     * @test
     */
    public function test_update_courier_provider()
    {
        $courierProvider = $this->makeCourierProvider();
        $editedCourierProvider = $this->fakeCourierProviderData();

        $this->response = $this->json('PUT', '/api/courierProviders/'.$courierProvider->id, $editedCourierProvider);

        $this->assertApiResponse($editedCourierProvider);
    }

    /**
     * @test
     */
    public function test_delete_courier_provider()
    {
        $courierProvider = $this->makeCourierProvider();
        $this->response = $this->json('DELETE', '/api/courierProviders/'.$courierProvider->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/courierProviders/'.$courierProvider->id);

        $this->response->assertStatus(404);
    }
}
