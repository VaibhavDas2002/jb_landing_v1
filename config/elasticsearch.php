<?php
return [
    'host' => env('ELASTICSEARCH_HOST', 'https://localhost:9200'),

    // credentials
    'username' => env('ELASTICSEARCH_USERNAME', 'elastic'),
    'password' => env('ELASTICSEARCH_PASSWORD', 'r4ovhToSkXgr40H5Fdc5'),

    'ssl_verification' => false,  // required for Windows self-signed cert
];
