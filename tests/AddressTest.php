<?php
/**
 * Contains the AddressTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-29
 *
 */


namespace Vanilo\Address\Tests;


use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Address\Models\AddressProxy;
use Vanilo\Address\Models\Address;
use Vanilo\Contracts\Address as VaniloAddressContract;

class AddressTest extends TestCase
{
    /**
     * @test
     */
    public function address_proxy_resolves_to_the_extended_address_class()
    {
        $this->assertEquals(Address::class, AddressProxy::modelClass());
    }

    /**
     * @test
     */
    public function root_address_contract_is_bound_to_the_extended_address_class()
    {
        $address = app(AddressContract::class);

        $this->assertInstanceOf(Address::class, $address);
    }

    /**
     * @test
     */
    public function it_implements_the_vanilo_address_contract_as_well()
    {
        $address = app(AddressContract::class);

        $this->assertInstanceOf(VaniloAddressContract::class, $address);
    }

    /**
     * @test
     */
    public function it_can_be_saved_to_database()
    {
        $address = AddressProxy::create([
            'name'       => 'Amelie Grant',
            'country_id' => 'SE',
            'city'       => 'Stockholm',
            'address'    => '37 Hamngatan'
        ])->fresh();

        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals('Amelie Grant', $address->name);
        $this->assertEquals('SE', $address->country_id);
        $this->assertEquals('Stockholm', $address->city);
        $this->assertEquals('37 Hamngatan', $address->address);
    }

    /**
     * @test
     */
    public function vanilo_interface_is_implemented_properly()
    {
        $address = AddressProxy::create([
            'name'       => 'Amelie Grant',
            'country_id' => 'SE',
            'city'       => 'Stockholm',
            'address'    => '37 Hamngatan'
        ])->fresh();

        $this->assertInstanceOf(VaniloAddressContract::class, $address);
        $this->assertEquals('Amelie Grant', $address->getName());
        $this->assertEquals('SE', $address->getCountryCode());
        $this->assertEquals('Stockholm', $address->getCity());
        $this->assertEquals('37 Hamngatan', $address->getAddress());
    }
}
