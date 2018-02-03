<?php namespace Bantenprov\PPBekerja\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The PPBekerja facade.
 *
 * @package Bantenprov\PPBekerja
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PPBekerja extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pp-bekerja';
    }
}
