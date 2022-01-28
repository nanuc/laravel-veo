<?php

namespace Nanuc\LaravelVeo\Facades;

use Illuminate\Support\Facades\Facade;

class Veo extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'veo-api';
    }
}