<?php namespace Trance\Facades;

use Illuminate\Support\Facades\Facade;

class Trance extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'trance';
    }
}