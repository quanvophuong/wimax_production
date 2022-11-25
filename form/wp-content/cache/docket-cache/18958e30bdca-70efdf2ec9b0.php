<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                17,
            ],
            'post_author' => [
                '3',
            ],
            'post_date' => [
                '2022-10-24 10:29:16',
            ],
            'post_date_gmt' => [
                '2022-10-24 01:29:16',
            ],
            'post_content' => [
                'https://free-max.com/form/wp-content/uploads/2022/10/cropped-wifi.png',
            ],
            'post_title' => [
                'cropped-wifi.png',
            ],
            'post_excerpt' => [
                '',
            ],
            'post_status' => [
                'inherit',
            ],
            'comment_status' => [
                'open',
            ],
            'ping_status' => [
                'closed',
            ],
            'post_password' => [
                '',
            ],
            'post_name' => [
                'cropped-wifi-png',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-10-24 10:29:16',
            ],
            'post_modified_gmt' => [
                '2022-10-24 01:29:16',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/wp-content/uploads/2022/10/cropped-wifi.png',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'attachment',
            ],
            'post_mime_type' => [
                'image/png',
            ],
            'comment_count' => [
                '0',
            ],
            'filter' => [
                'raw',
            ],
        ],
    ],
    [
        'timestamp' => 1669108092,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 17,
        'type' => 'object',
        'timeout' => 1670317692,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/