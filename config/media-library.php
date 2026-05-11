<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Media Library Configuration
    |--------------------------------------------------------------------------
    */

    'disk' => env('MEDIA_DISK', 'public'),
    'prefix' => 'media',
    'conversion_disk' => env('MEDIA_CONVERSION_DISK', 'public'),

];
