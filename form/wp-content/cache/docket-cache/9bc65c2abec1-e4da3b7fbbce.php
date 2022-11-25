<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                '5',
            ],
            'user_login' => [
                'fm-admin-isobe',
            ],
            'user_pass' => [
                '$P$B5K6UJ73NxJJD6sIv2.d9/irlwnxkn0',
            ],
            'user_nicename' => [
                'fm-admin-isobe',
            ],
            'user_email' => [
                'isobe@nitticompany.com',
            ],
            'user_url' => [
                '',
            ],
            'user_registered' => [
                '2022-10-25 08:31:28',
            ],
            'user_activation_key' => [
                '',
            ],
            'user_status' => [
                '0',
            ],
            'display_name' => [
                'fm-admin-isobe',
            ],
        ],
    ],
    [
        'timestamp' => 1669109387,
        'site_id' => 1,
        'group' => 'users',
        'key' => '5',
        'type' => 'object',
        'timeout' => 0,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/