<?php

namespace Erenav\Makers\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Erenav\Makers\Makers
 */
class Makers extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Erenav\Makers\Makers::class;
    }
}
