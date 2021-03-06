<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'github' => [
//        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_id' =>'8785fb8b274ddfb04f97',
        // 'client_secret' => env('GITHUB_CLIENT_SECRET'),

        'client_secret' => '62c16fb8362fa3dc9222ecc21a231be95f7dcec6',
        'redirect' => 'http://127.0.0.1:8000/login/github/callback',
    ],
    'google' => [
        // 'client_id' => env('GOOGLE_CLIENT_ID'),         // Your Google Client ID
        'client_id' =>'771834996179-8vjh9r8rnc8c615jc3ku2r1nqs18menh.apps.googleusercontent.com',
        // 'client_secret' => env('GOOGLE_CLIENT_SECRET'), // Your Google Client Secret
        'client_secret' =>'Mu6S_JZztNwPTZZzNjo5pMdJ',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],
];
