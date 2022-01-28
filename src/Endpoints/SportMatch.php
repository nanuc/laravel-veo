<?php

namespace Nanuc\LaravelVeo\Endpoints;

use Illuminate\Support\Str;
use Nanuc\Nextcloud\ResponseParsers\GroupListParser;
use Nanuc\Nextcloud\ResponseParsers\UserListParser;

class SportMatch extends Endpoint
{
    public function all()
    {
        return $this->get('matches/?filter=own&fields=created&fields=duration&fields=end&fields=start&fields=thumbnail&fields=slug&fields=opponent_club_name&fields=title');
    }

    public function videosForMatch($match)
    {
        return $this->get("matches/{$match}/videos/");
    }
}
