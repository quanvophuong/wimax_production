<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                201,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-18 12:56:26',
            ],
            'post_date_gmt' => [
                '0000-00-00 00:00:00',
            ],
            'post_content' => [
                '',
            ],
            'post_title' => [
                '自動下書き',
            ],
            'post_excerpt' => [
                '',
            ],
            'post_status' => [
                'auto-draft',
            ],
            'comment_status' => [
                '',
            ],
            'ping_status' => [
                '0',
            ],
            'post_password' => [
                '',
            ],
            'post_name' => [
                '',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-18 12:56:26',
            ],
            'post_modified_gmt' => [
                '0000-00-00 00:00:00',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/?p=201',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'post',
            ],
            'post_mime_type' => [
                '',
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
        'timestamp' => 1669109385,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 201,
        'type' => 'object',
        'timeout' => 1670318985,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/