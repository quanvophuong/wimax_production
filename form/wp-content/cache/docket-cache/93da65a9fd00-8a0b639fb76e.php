<?php if ( !\defined('ABSPATH') ) { return false; }
return [
    'timestamp' => 1669024956,
    'site_id' => 1,
    'group' => 'options',
    'key' => 'uninstall_plugins',
    'type' => 'array',
    'timeout' => 1670234556,
    'data' => [
        'advanced-database-cleaner-pro/advanced-db-cleaner.php' => [
            'ADBC_Advanced_DB_Cleaner_Pro',
            'aDBc_uninstall',
        ],
        'docket-cache/docket-cache.php' => [
            'Nawawi\\DocketCache\\Plugin',
            'uninstall',
        ],
        'addquicktag/addquicktag.php' => [
            'Add_Quicktag',
            'uninstall',
        ],
        'search-regex/search-regex.php' => [
            '\\SearchRegex\\Admin\\Admin',
            'plugin_uninstall',
        ],
        'addquicktag/inc/class-settings.php' => [
            'Add_Quicktag_Settings',
            'unregister_settings',
        ],
        'redirection/redirection.php' => [
            'Redirection_Admin',
            'plugin_uninstall',
        ],
    ],
];
/*@DOCKET_CACHE_EOF*/