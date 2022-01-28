<?php

return [
    'endpoint' => env('VEO_ENDPOINT', 'https://app.veo.co/api/app'),
    'username' => env('VEO_USERNAME'),
    'password' => env('VEO_PASSWORD'),
    'session-id-cache-key' => 'veo-session-id',
];