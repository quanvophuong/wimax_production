<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                '1',
            ],
            'user_login' => [
                'yumiji3156',
            ],
            'user_pass' => [
                '$P$BBKMeDHfSUAhXMqRWLA.3SI8vcX9kn0',
            ],
            'user_nicename' => [
                'yumiji3156',
            ],
            'user_email' => [
                'yumiji3156@linqru.jp',
            ],
            'user_url' => [
                'https://free-max.com/form',
            ],
            'user_registered' => [
                '2022-10-23 18:46:39',
            ],
            'user_activation_key' => [
                '',
            ],
            'user_status' => [
                '0',
            ],
            'display_name' => [
                'yumiji3156',
            ],
        ],
    ],
    [
        'timestamp' => 1669109382,
        'site_id' => 1,
        'group' => 'users',
        'key' => '1',
        'type' => 'object',
        'timeout' => 0,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/