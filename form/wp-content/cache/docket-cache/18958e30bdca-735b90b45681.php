<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                67,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-02 17:27:22',
            ],
            'post_date_gmt' => [
                '2022-11-02 08:27:22',
            ],
            'post_content' => [
                '[tabgroup title="安心補償オプションの解約"]'."\n"
                    ."\n"
                    .'[tab]'."\n"
                    ."\n"
                    .'[contact-form-7 id="61"]'."\n"
                    ."\n\n"
                    .'[/tab]'."\n"
                    ."\n"
                    .'[/tabgroup]',
            ],
            'post_title' => [
                '安心補償解約フォーム',
            ],
            'post_excerpt' => [
                '',
            ],
            'post_status' => [
                'inherit',
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
                '62-revision-v1',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-02 17:27:22',
            ],
            'post_modified_gmt' => [
                '2022-11-02 08:27:22',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                62,
            ],
            'guid' => [
                'https://free-max.com/form/?p=67',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'revision',
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
        'timestamp' => 1668147934,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 67,
        'type' => 'object',
        'timeout' => 1669357534,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/