<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                '3',
            ],
            'user_login' => [
                'fm-admin-ai',
            ],
            'user_pass' => [
                '$P$Bz9bQ.7TGcJtN.QLmAd36yRRpJftu51',
            ],
            'user_nicename' => [
                'fm-admin-ai',
            ],
            'user_email' => [
                'aida.takashi.l@gmail.com',
            ],
            'user_url' => [
                '',
            ],
            'user_registered' => [
                '2022-10-24 01:14:19',
            ],
            'user_activation_key' => [
                '1666574059:$P$B0r5eiON30WLeeMBf5PLL7FE5MZ.OU1',
            ],
            'user_status' => [
                '0',
            ],
            'display_name' => [
                'fm-admin-ai',
            ],
        ],
    ],
    [
        'timestamp' => 1669004985,
        'site_id' => 1,
        'group' => 'users',
        'key' => '3',
        'type' => 'object',
        'timeout' => 0,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/