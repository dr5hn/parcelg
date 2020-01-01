<?php namespace Tests\Traits;

use App\Models\CourierProvider;
use App\Repositories\CourierProviderRepository;
use Faker\Factory as Faker;

trait MakeCourierProviderTrait
{
    /**
     * Create fake instance of CourierProvider and save it in database
     *
     * @param array $courierProviderFields
     * @return CourierProvider
     */
    public function makeCourierProvider($courierProviderFields = [])
    {
        /** @var CourierProviderRepository $courierProviderRepo */
        $courierProviderRepo = \App::make(CourierProviderRepository::class);
        $theme = $this->fakeCourierProviderData($courierProviderFields);
        return $courierProviderRepo->create($theme);
    }

    /**
     * Get fake instance of CourierProvider
     *
     * @param array $courierProviderFields
     * @return CourierProvider
     */
    public function fakeCourierProvider($courierProviderFields = [])
    {
        return new CourierProvider($this->fakeCourierProviderData($courierProviderFields));
    }

    /**
     * Get fake data of CourierProvider
     *
     * @param array $courierProviderFields
     * @return array
     */
    public function fakeCourierProviderData($courierProviderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'business_name' => $fake->word,
            'gst_number' => $fake->word,
            'pan_number' => $fake->word,
            'owner_user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word
        ], $courierProviderFields);
    }
}
