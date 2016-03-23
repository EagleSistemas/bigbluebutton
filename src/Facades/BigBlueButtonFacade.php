<?php namespace EagleSistemas\BigBlueButton\Facades;

use Illuminate\Support\Facades\Facade;

class BigBlueButtonFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'bigbluebuttonapi';
    }
}