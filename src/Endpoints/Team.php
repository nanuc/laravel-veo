<?php

namespace Nanuc\LaravelVeo\Endpoints;

use Illuminate\Support\Str;
use Nanuc\Nextcloud\ResponseParsers\GroupListParser;
use Nanuc\Nextcloud\ResponseParsers\UserListParser;

class Team extends Endpoint
{
    public function all()
    {
        return $this->get('teams/?filter=own&fields=club&fields=club__crest&fields=club__slug&fields=club__title&fields=image&fields=match_count&fields=member_count&fields=name&fields=permissions&fields=slug&fields=url');
    }

    public function videosForTeam($team)
    {
        return $this->get("matches/{$match}/videos/");
    }

    public function matchesForTeam($club, $team)
    {
        return $this->get("matches/?club=$club&team=$team&fields=camera&fields=created&fields=duration&fields=is_shared_recording&fields=permissions&fields=processing_status&fields=slug&fields=start&fields=title&fields=team&fields=team__name&fields=thumbnail&fields=url");
    }
}
