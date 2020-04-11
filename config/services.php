<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, SparkPost and others. This file provides a sane default
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'facebook' => [
        'client_id' => '217775682858002',
        'client_secret' => '769d301b1545c6ecceaa38b5e12a58d5',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],


    'google' => [
        'client_id' =>  env('googleClient_ID'),
        'client_secret' =>  env('google_SECRET'),
        'redirect' =>  env('google_calback'),
    ],

    'github' => [
        'client_id' =>  env('githubClient_ID'),
        'client_secret' =>  env('github_SECRET'),
        'redirect' =>  env('github_calback'),
    ],

];
