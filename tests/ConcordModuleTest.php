<?php
/**
 * Contains the ConcordModuleTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2017-11-29
 *
 */


namespace Vanilo\Address\Tests;


class ConcordModuleTest extends TestCase
{
    /**
     * @test
     */
    public function dependent_concord_modules_are_present()
    {
        $modules = $this->app->concord
            ->getModules()
            ->keyBy(function($module) {
                return $module->getId();
            });

        $this->assertTrue($modules->has('konekt.address'), 'Address module should be registered');

        $this->assertTrue(
            $modules->get('vanilo.address')
                    ->getKind()
                    ->isModule(),
            'Concord Module Type Should be a module'
        );
    }

}
