<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                62,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-02 17:23:11',
            ],
            'post_date_gmt' => [
                '2022-11-02 08:23:11',
            ],
            'post_content' => [
                '[tabgroup title="安心補償オプションの解約"]'."\r\n"
                    ."\r\n"
                    .'[tab]'."\r\n"
                    ."\r\n"
                    .'[contact-form-7 id="61"]'."\r\n"
                    ."\r\n"
                    .'[/tab]'."\r\n"
                    ."\r\n"
                    .'[/tabgroup]',
            ],
            'post_title' => [
                '安心補償解約フォーム',
            ],
            'post_excerpt' => [
                '',
            ],
            'post_status' => [
                'publish',
            ],
            'comment_status' => [
                'closed',
            ],
            'ping_status' => [
                'closed',
            ],
            'post_password' => [
                '',
            ],
            'post_name' => [
                'op-kaiyaku',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-11 15:31:28',
            ],
            'post_modified_gmt' => [
                '2022-11-11 06:31:28',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/?page_id=62',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'page',
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
        'timestamp' => 1669277275,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 62,
        'type' => 'object',
        'timeout' => 1670486875,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/