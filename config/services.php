<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'openai' => [
        'key' => env('OPENAI_API_KEY'),
    ],

    /*
    | Open Food Facts — base mondiale (produits + pays de vente, dont Tunisie).
    | https://wiki.openfoodfacts.org/API — user-agent obligatoire.
    */
    'open_food_facts' => [
        'enabled' => env('OPENFOODFACTS_ENABLED', true),
        'base_url' => env('OPENFOODFACTS_API_BASE', 'https://world.openfoodfacts.org'),
        'website_base' => env('OPENFOODFACTS_WEB_BASE', 'https://world.openfoodfacts.org'),
        'timeout' => env('OPENFOODFACTS_TIMEOUT', 15),
        'cache_ttl' => env('OPENFOODFACTS_CACHE_TTL', 86400),
        'user_agent' => env(
            'OPENFOODFACTS_USER_AGENT',
            'ZeroDechet-local/1.0 (+https://openfoodfacts.org)'
        ),
    ],

    /*
    | Agrégation scan : plusieurs sources gratuites (OFF v2 → v0 → recherche OFF → UPCitemdb trial).
    */
    'barcode_resolver' => [
        'cache_ttl' => env('BARCODE_RESOLVER_CACHE_TTL', 86400),
    ],

    'upcitemdb' => [
        'enabled' => env('UPCITEMDB_ENABLED', true),
        'base_url' => env('UPCITEMDB_API_BASE', 'https://api.upcitemdb.com'),
        'timeout' => env('UPCITEMDB_TIMEOUT', 12),
    ],

];