<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                '4',
            ],
            'user_login' => [
                'fm-admin-okubo',
            ],
            'user_pass' => [
                '$P$BHTIH3MBgRE60fCyabRFMiBbShFUjo1',
            ],
            'user_nicename' => [
                'fm-admin-okubo',
            ],
            'user_email' => [
                'okubo@nitticompany.com',
            ],
            'user_url' => [
                '',
            ],
            'user_registered' => [
                '2022-10-24 01:54:30',
            ],
            'user_activation_key' => [
                '',
            ],
            'user_status' => [
                '0',
            ],
            'display_name' => [
                'fm-admin-okubo',
            ],
        ],
    ],
    [
        'timestamp' => 1669109380,
        'site_id' => 1,
        'group' => 'users',
        'key' => '4',
        'type' => 'object',
        'timeout' => 0,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/