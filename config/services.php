<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
        'client_id' => 'AaSCMI55CncfP8loGBoNsyqtcJ3axN34C_KZkxYW8RbWtFKRjhXjZ3HBNHQ7g5xECnZLIg7HZcwuGpmf',
        'secret' => 'EKuJgF70i2UDdnWJvanHQbmv85mEG7nGgXGZYRv0WlS_sP2Q1GUvYsn-RVK2vj3jNL1qk8E_YGOXxh8_',
    ],

];
