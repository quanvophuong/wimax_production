<?php if ( !\defined('ABSPATH') ) { return false; }
if ( !@class_exists('WP_Post', false) ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['WP_Post'] ?? \Nawawi\DocketCache\Exporter\Registry::p('WP_Post')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                65,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-02 17:22:42',
            ],
            'post_date_gmt' => [
                '2022-11-02 08:22:42',
            ],
            'post_content' => [
                '[tab title="安心補償オプションの解約"]'."\r\n"
                    ."\r\n"
                    .'[contact-form-7 id="61" title="HosyouCancelForm"]',
            ],
            'post_title' => [
                '安心補償解約フォーム',
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
            'post_name' => [
                '62-revision-v1',
            ],
            'post_modified' => [
                '2022-11-02 17:22:42',
            ],
            'post_modified_gmt' => [
                '2022-11-02 08:22:42',
            ],
            'post_parent' => [
                62,
            ],
            'guid' => [
                'https://free-max.com/form/?p=65',
            ],
            'post_type' => [
                'revision',
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
        'key' => 65,
        'type' => 'object',
        'timeout' => 1669357534,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/