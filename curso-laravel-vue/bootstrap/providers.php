<?php

return [
    /*
    |-------------------------------------------------------
    | Application Service Providers
    |-------------------------------------------------------
    |
    | Los providers de tu aplicación.
    */
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    App\Providers\JetstreamServiceProvider::class,

    /*
    |-------------------------------------------------------
    | Core Framework Service Providers (necesarios)
    |-------------------------------------------------------
    |
    | Estos providers aseguran que servicios como "view",
    | "translation", "events", "routing", "cache" y "database"
    | queden registrados correctamente.
    */
    Illuminate\Events\EventServiceProvider::class,
    Illuminate\Routing\RoutingServiceProvider::class,
    Illuminate\View\ViewServiceProvider::class,
    Illuminate\Translation\TranslationServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Database\DatabaseServiceProvider::class,
];
