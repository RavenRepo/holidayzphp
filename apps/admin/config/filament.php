<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    |
    | By uncommenting the Laravel Echo configuration, you may connect Filament
    | to any Pusher-compatible websockets server.
    |
    | This will allow your users to receive real-time notifications.
    |
    */

    'broadcasting' => [
        // 'echo' => [
        //     'broadcaster' => 'pusher',
        //     'key' => env('VITE_PUSHER_APP_KEY'),
        //     'cluster' => env('VITE_PUSHER_APP_CLUSTER'),
        //     'forceTLS' => true,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | This is the storage disk Filament will use to put media. You may use any
    | of the disks defined in the `config/filesystems.php`.
    |
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets
    |--------------------------------------------------------------------------
    |
    | This configuration option allows you to define the asset base URL for all
    | of your Filament panel resources. If this is not set, Filament will
    | attempt to detect the correct URL automatically.
    |
    */

    'assets_path' => null,
    
    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    |
    | This sets the delay before loading indicators appear.
    |
    */
    
    'livewire_loading_delay' => 200,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify Google fonts that should be loaded by
    | Filament.
    |
    */

    'google_fonts' => [
        'Inter',
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset Libraries
    |--------------------------------------------------------------------------
    |
    | This option allows you to specify which asset libraries should be loaded
    | by Filament.
    |
    */

    'asset_libraries' => [
        'styles' => [
            'css/filament/filament/app.css',
            'css/filament/forms/forms.css',
            'css/filament/support/support.css',
        ],
        'scripts' => [
            'js/filament/filament/app.js',
            'js/filament/filament/echo.js',
            'js/filament/forms/components/color-picker.js',
            'js/filament/forms/components/date-time-picker.js',
            'js/filament/forms/components/file-upload.js',
            'js/filament/forms/components/key-value.js',
            'js/filament/forms/components/markdown-editor.js',
            'js/filament/forms/components/rich-editor.js',
            'js/filament/forms/components/select.js',
            'js/filament/forms/components/tags-input.js',
            'js/filament/forms/components/textarea.js',
            'js/filament/notifications/notifications.js',
            'js/filament/support/support.js',
            'js/filament/tables/components/table.js',
            'js/filament/widgets/components/chart.js',
            'js/filament/widgets/components/stats-overview/stat/chart.js',
        ],
    ],
];
