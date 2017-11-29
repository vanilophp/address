<?php
/**
 * Contains the ModuleServiceProvider class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-29
 *
 */


namespace Vanilo\Address\Providers;

use Konekt\Address\Contracts\Address as AddressContract;
use Konekt\Concord\BaseModuleServiceProvider;
use Vanilo\Address\Models\Address;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    public function boot()
    {
        parent::boot();

        // Use the vanilo extended model classes
        $this->concord->registerModel(AddressContract::class, Address::class);
    }
}
