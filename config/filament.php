<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filament Global Configuration
    |--------------------------------------------------------------------------
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),
    'assets_path' => null,
    'cache_path' => base_path('bootstrap/cache/filament'),
    'relative_urls' => false,

];
