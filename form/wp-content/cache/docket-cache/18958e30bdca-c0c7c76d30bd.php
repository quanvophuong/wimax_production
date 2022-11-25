<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                50,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-10-26 11:30:00',
            ],
            'post_date_gmt' => [
                '2022-10-26 02:30:00',
            ],
            'post_content' => [
                '',
            ],
            'post_title' => [
                'S__376471556',
            ],
            'post_excerpt' => [
                '',
            ],
            'post_status' => [
                'inherit',
            ],
            'comment_status' => [
                '',
            ],
            'ping_status' => [
                'closed',
            ],
            'post_password' => [
                '',
            ],
            'post_name' => [
                's__376471556',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-10-26 11:30:00',
            ],
            'post_modified_gmt' => [
                '2022-10-26 02:30:00',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                11,
            ],
            'guid' => [
                'https://free-max.com/form/wp-content/uploads/2022/10/S__376471556.jpg',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'attachment',
            ],
            'post_mime_type' => [
                'image/jpeg',
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
        'timestamp' => 1669011552,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 50,
        'type' => 'object',
        'timeout' => 1670221152,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/