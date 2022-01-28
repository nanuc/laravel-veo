<?php

namespace Nanuc\LaravelVeo;

use Nanuc\LaravelVeo\Endpoints\SportMatch;
use Nanuc\LaravelVeo\Endpoints\Team;
use Nanuc\LaravelVeo\Endpoints\User;

class LaravelVeoFactory
{
    public function match()
    {
        return new SportMatch;
    }

    public function team()
    {
        return new Team();
    }
    
    public function user()
    {
        return new User();
    }
}
