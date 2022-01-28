<?php

namespace Nanuc\LaravelVeo\Endpoints;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Endpoint
{
    protected function get($uri)
    {
        return $this->request('get', $uri, null);
    }

    /*
    protected function post($uri, $data = [], $parserClass = ResponseParser::class)
    {
        return $this->request('post', $uri, $data, $parserClass);
    }

    protected function put($uri, $data = [], $parserClass = ResponseParser::class)
    {
        return $this->request('put', $uri, $data, $parserClass);
    }

    protected function delete($uri, $data = [], $parserClass = ResponseParser::class)
    {
        return $this->request('delete', $uri, $data, $parserClass);
    }
    */

    protected function request($method, $uri, $data)
    {
        $time = microtime(true);
        $response = $this->getClient()->$method($this->getUrl($uri));
        $time = microtime(true) - $time;

        return $response->json();
    }
    
    private function getUrl($uri)
    {
        return config('laravel-veo.endpoint') . '/' . $uri;
    }
    
    private function getClient()
    {
        return Http::withHeaders([
            'Veo-App-Id' => 'hazard',
            'Cookie' => 'sessionid=' . $this->getSessionId(),
        ]);
    }

    private function getSessionId()
    {
        return Cache::remember(config('laravel-veo.session-id-cache-key'), now()->addMinutes(10), function() {
            return $this->loginToVeo(config('laravel-veo.username'), config('laravel-veo.password'));
        });
    }

    protected function loginToVeo($username, $password)
    {
        $response = Http::withHeaders([
            'Veo-App-Id' => 'hazard',
        ])->post(config('laravel-veo.endpoint') . '/auth/login/', [
            'email' => $username,
            'password' => $password,
            'remember' => false,
        ]);

        if($cookie = $response->cookies()->getCookieByName('sessionid')) {
            return $cookie->getValue();
        }
        else {
            return false;
        }
    }
}
