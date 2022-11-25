<?php if ( !\defined('ABSPATH') ) { return false; }
return [
    'timestamp' => 1669109384,
    'site_id' => 1,
    'group' => 'transient',
    'key' => 'rsssl_admin_notices',
    'type' => 'array',
    'timeout' => 1669714184,
    'data' => [
        'upgraded_to_6' => [
            'condition' => [
                'RSSSL()->admin->is_upgraded_to_6',
            ],
            'callback' => '_true_',
            'output' => [
                'msg' => 'Thanks for updating to Really Simple SSL 6.0! Check out our new features on the settings page.',
                'icon' => 'open',
                'admin_notice' => true,
                'url' => 'https://free-max.com/form/wp-admin/options-general.php?page=really-simple-security',
                'dismissible' => true,
                'plusone' => true,
                'status' => 'open',
                'label' => '作業待ち',
            ],
        ],
    ],
];
/*@DOCKET_CACHE_EOF*/