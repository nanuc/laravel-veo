<?php

namespace Nanuc\LaravelVeo\Endpoints;

use Illuminate\Support\Str;
use Nanuc\Nextcloud\ResponseParsers\GroupListParser;
use Nanuc\Nextcloud\ResponseParsers\UserListParser;

class User extends Endpoint
{
    public function checkCredentials($username, $password)
    {
        return (bool) $this->loginToVeo($username, $password);
    }
}
