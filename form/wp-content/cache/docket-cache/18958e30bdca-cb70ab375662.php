<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                243,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-24 18:46:49',
            ],
            'post_date_gmt' => [
                '2022-11-24 09:46:49',
            ],
            'post_content' => [
                '',
            ],
            'post_title' => [
                '38075',
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
                '38075',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-24 18:46:49',
            ],
            'post_modified_gmt' => [
                '2022-11-24 09:46:49',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/wp-content/uploads/2022/11/38075.jpg',
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
        'timestamp' => 1669283209,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 243,
        'type' => 'object',
        'timeout' => 1670492809,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/