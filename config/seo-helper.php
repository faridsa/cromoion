<?php

return [

    /* -----------------------------------------------------------------
     |  Title
     | -----------------------------------------------------------------
     */

    'title' => [
        'default'   => 'Cromoion',
        'site-name' => config('app.name', 'Cromoion web'),
        'separator' => '-',
        'first'     => true,
        'max'       => 55,
    ],

    /* -----------------------------------------------------------------
     |  Description
     | -----------------------------------------------------------------
     */

    'description' => [
        'default'   => 'Conozca las últimas novedades en reactivos y equipos para laboratorios. Somos representantes de las marcas más importantes',
        'max'       => 155,
    ],

    /* -----------------------------------------------------------------
     |  Keywords
     | -----------------------------------------------------------------
     */

    'keywords'  => [
        'default'   => [
            //
        ],
    ],

    /* -----------------------------------------------------------------
     |  Miscellaneous
     | -----------------------------------------------------------------
     */

    'misc'      => [
        'canonical' => true,
        'robots'    => config('app.env') !== 'production', // Tell robots not to index the content if it's not on production
        'default'   => [
            'viewport'  => 'width=device-width, initial-scale=1', // Responsive design thing
            'author'    => '', // https://plus.google.com/[YOUR PERSONAL G+ PROFILE HERE]
            'publisher' => '', // https://plus.google.com/[YOUR PERSONAL G+ PROFILE HERE]
        ],
    ],

    /* -----------------------------------------------------------------
     |  Webmaster Tools
     | -----------------------------------------------------------------
     */

    'webmasters' => [
        'google'    => '',
        'bing'      => '',
        'alexa'     => '',
        'pinterest' => '',
        'yandex'    => '',
    ],

    /* -----------------------------------------------------------------
     |  Open Graph
     | -----------------------------------------------------------------
     */

    'open-graph' => [
        'enabled'     => true,
        'prefix'      => 'og:',
        'type'        => 'website',
        'title'       => 'Cromoion',
        'description' => 'Conozca las últimas novedades en reactivos y equipos para laboratorios. Somos representantes de las marcas más importantes',
        'site-name'   => '',
        'properties'  => [
            //
        ],
    ],

    /* -----------------------------------------------------------------
     |  Twitter
     | -----------------------------------------------------------------
     |  Supported card types : 'app', 'gallery', 'photo', 'player', 'product', 'summary', 'summary_large_image'.
     */

    'twitter' => [
        'enabled' => true,
        'prefix'  => 'twitter:',
        'card'    => 'summary',
        'site'    => 'Username',
        'title'   => 'Default Twitter Card title',
        'metas'   => [
            //
        ],
    ],

    /* -----------------------------------------------------------------
     |  Analytics
     | -----------------------------------------------------------------
     */

    'analytics' => [
        'google' => 'UA-18306231-1', // UA-XXXXXXXX-X
    ],

];
