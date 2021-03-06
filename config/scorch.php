<?php

use App\Providers\RouteServiceProvider;

return [
    /*
     * Authentication Guard.
     */
    'guard' => 'web',

    /*
     * Scorch Password Broker.
     */
    'passwords' => 'users',

    /*
     * Username / Email.
     */
    'username' => 'email',
    'email' => 'email',

    /*
     * Home Path.
     */
    'home' => RouteServiceProvider::HOME,

    /*
     * Scorch Routes Prefix / Subdomain.
     */
    'prefix' => '',
    'domain' => null,

    /*
     * Scorch Routes Middleware
     */
    'middleware' => ['web'],

    /*
     * Rate Limiting.
     */
    'limiters' => [
        'login' => 'login',
        'two-factor' => 'two-factor',
    ],

    /*
     * Additional middelware type classes to run when attempting to authenticate user.
     */
    'login_pipeline' => [],

    'auth_routes' => [
        'login' => false,
        'register' => false,
        'forgot-password' => false,
        'two-factor-challenge' => false,
    ],

    /*
     * Register View Routes.
     */
    'views' => true,

    /*
     * Stateful Domains.
     */
    'stateful' => explode(',', env('STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        env('APP_URL') ? ',' . parse_url(env('APP_URL'), \PHP_URL_HOST) : ''
    ))),

    /*
     * Expiration Minutes.
     */
    'expiration' => null,

    /*
     * API Middleware.
     *
     * When authenticating your first-party SPA with API you may need to
     * customize some of the middleware API uses while processing the
     * request. You may change the middleware listed below as required.
     */
    'stateful_middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],
];
