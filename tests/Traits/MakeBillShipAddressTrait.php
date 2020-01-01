<?php namespace Tests\Traits;

use App\Models\BillShipAddress;
use App\Repositories\BillShipAddressRepository;
use Faker\Factory as Faker;

trait MakeBillShipAddressTrait
{
    /**
     * Create fake instance of BillShipAddress and save it in database
     *
     * @param array $billShipAddressFields
     * @return BillShipAddress
     */
    public function makeBillShipAddress($billShipAddressFields = [])
    {
        /** @var BillShipAddressRepository $billShipAddressRepo */
        $billShipAddressRepo = \App::make(BillShipAddressRepository::class);
        $theme = $this->fakeBillShipAddressData($billShipAddressFields);
        return $billShipAddressRepo->create($theme);
    }

    /**
     * Get fake instance of BillShipAddress
     *
     * @param array $billShipAddressFields
     * @return BillShipAddress
     */
    public function fakeBillShipAddress($billShipAddressFields = [])
    {
        return new BillShipAddress($this->fakeBillShipAddressData($billShipAddressFields));
    }

    /**
     * Get fake data of BillShipAddress
     *
     * @param array $billShipAddressFields
     * @return array
     */
    public function fakeBillShipAddressData($billShipAddressFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'flat_no' => $fake->word,
            'building' => $fake->word,
            'street' => $fake->word,
            'pincode' => $fake->word,
            'area' => $fake->word,
            'city' => $fake->randomDigitNotNull,
            'state' => $fake->randomDigitNotNull,
            'country' => $fake->randomDigitNotNull,
            'type' => $fake->word,
            'latitude' => $fake->word,
            'longitude' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'status' => $fake->word
        ], $billShipAddressFields);
    }
}
