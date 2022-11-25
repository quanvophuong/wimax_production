<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                38,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-10-25 18:17:44',
            ],
            'post_date_gmt' => [
                '2022-10-25 09:17:44',
            ],
            'post_content' => [
                '[page_header height="0px" margin="9px" type="subnav" align="center" v_align="bottom" depth="2" title_size="smaller" nav_style="simple" bg_size="original"]'."\r\n"
                    ."\r\n"
                    .'[contact-form-7 id="7"]',
            ],
            'post_title' => [
                'お問い合わせフォーム',
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
                'otoiawase',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-11 15:31:17',
            ],
            'post_modified_gmt' => [
                '2022-11-11 06:31:17',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/?page_id=38',
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
        'key' => 38,
        'type' => 'object',
        'timeout' => 1670486875,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/