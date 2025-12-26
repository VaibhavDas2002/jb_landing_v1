<?php
return [
    'host' => env('ELASTICSEARCH_HOST', 'https://localhost:9200'),

    // credentials
    'username' => env('ELASTICSEARCH_USERNAME', 'elastic'),
    'password' => env('ELASTICSEARCH_PASSWORD', 'Yy69IQuvVGCmGWH4vpFw'),

    'ssl_verification' => false,  // required for Windows self-signed cert
];
