<?php

// return [

//     'paths' => ['api/*', 'sanctum/csrf-cookie'],

//     'allowed_methods' => ['*'],

//     'allowed_origins' => ['http://localhost:5173', 'https://makimacoffeeshop-production.up.railway.app'],

//     'allowed_origins_patterns' => [],

//     'allowed_headers' => ['*'],

//     'exposed_headers' => [],

//     'max_age' => 0,

//     'supports_credentials' => false,

// ];
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ["https://makima-coffee-shop-frontend.vercel.app"],
    'allowed_origins_patterns' => ["*.vercel.app"],
    'allowed_headers' => ['*'],
    'supports_credentials' => true,
    'max_age' => 24 * 3600
];

