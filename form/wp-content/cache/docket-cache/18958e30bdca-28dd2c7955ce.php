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
                77,
            ],
            'post_author' => [
                '3',
            ],
            'post_date' => [
                '2022-11-04 12:26:43',
            ],
            'post_date_gmt' => [
                '2022-11-04 03:26:43',
            ],
            'post_content' => [
                '[tabgroup title="端末の解約"]'."\r\n"
                    ."\r\n"
                    .'[tab_inner]'."\r\n"
                    .'[tab]'."\r\n"
                    .'※<strong>当月</strong><strong>解約の</strong><span class="faq_red"><strong>締切日は<span style="color: #ed1c24;">毎月15日</span></strong></span>となります。'."\r\n"
                    .'<span class="faq_red"><strong>16日以降のご解約申請</strong>に関しては<strong>翌月末の解約</strong></span>となりますので予めご了承ください。'."\r\n"
                    .'※安心補償オプションにご加入されているお客様は、「<strong>安心補償オプションの解約</strong>」のご申請は必要ございません。'."\r\n"
                    ."\r\n"
                    .'<strong>IMEIの確認方法</strong>'."\r\n"
                    ."\r\n"
                    .'[row_inner]'."\r\n"
                    ."\r\n"
                    .'[col_inner span="6" span__sm="12"]'."\r\n"
                    ."\r\n"
                    .'<strong>【<span style="color: #4da4fd;">Galaxy 5G Mobile Wi-Fi</span>】</strong>'."\r\n"
                    ."\r\n"
                    .'[ux_image id="50" image_size="medium" width="70"]'."\r\n"
                    ."\r\n"
                    .'[/col_inner]'."\r\n"
                    .'[col_inner span="6" span__sm="12"]'."\r\n"
                    ."\r\n"
                    .'<strong>【<span style="color: #4da4fd;">Speed Wi-Fi HOME 5G L11</span>】</strong>'."\r\n"
                    ."\r\n"
                    .'[ux_image id="51" width="70"]'."\r\n"
                    ."\r\n"
                    .'[/col_inner]'."\r\n"
                    ."\r\n"
                    .'[/row_inner]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[contact-form-7 id="9"]'."\r\n"
                    .'[/tab]'."\r\n"
                    ."\r\n"
                    .'[/tab_inner]'."\r\n"
                    ."\r\n"
                    .'[/tabgroup]'."\r\n"
                    ."\r\n"
                    ."\r\n",
            ],
            'post_title' => [
                '解約フォーム',
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
                '75-revision-v1',
            ],
            'post_modified' => [
                '2022-11-04 12:26:43',
            ],
            'post_modified_gmt' => [
                '2022-11-04 03:26:43',
            ],
            'post_parent' => [
                75,
            ],
            'guid' => [
                'https://free-max.com/form/?p=77',
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
        'timestamp' => 1668759759,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 77,
        'type' => 'object',
        'timeout' => 1669969359,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/