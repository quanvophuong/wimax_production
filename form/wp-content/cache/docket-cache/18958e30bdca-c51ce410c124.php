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
                13,
            ],
            'post_author' => [
                '3',
            ],
            'post_date' => [
                '2022-10-24 10:26:40',
            ],
            'post_date_gmt' => [
                '2022-10-24 01:26:40',
            ],
            'post_content' => [
                '[tabgroup title="お問い合わせ内容を選択してください" style="tabs" class="cloudwifi-inquiry"]'."\r\n"
                    ."\r\n"
                    .'[tab title="端末の解約"]'."\r\n"
                    ."\r\n"
                    .'[row]'."\r\n"
                    ."\r\n"
                    .'[col span__sm="12"]'."\r\n"
                    ."\r\n"
                    .'※<strong>当月</strong><strong>解約の</strong><span class="faq_red"><strong>締切日は毎月15日</strong></span>となります。'."\r\n"
                    .'<span class="faq_red"><strong>16日以降のご解約申請</strong>に関しては<strong>翌月末の解約</strong></span>となりますので予めご了承ください。'."\r\n"
                    .'※安心補償オプションにご加入されているお客様は、「<strong>安心補償オプションの解約</strong>」のご申請は必要ございません。'."\r\n"
                    ."\r\n"
                    .'[/col]'."\r\n"
                    ."\r\n"
                    .'[/row]'."\r\n"
                    .'[contact-form-7 id="9"]'."\r\n"
                    ."\r\n"
                    .'[/tab]'."\r\n"
                    .'[tab title="安心補償オプションの解約"]'."\r\n"
                    ."\r\n"
                    .'※<strong>当月</strong><strong>解約の</strong><span class="faq_red"><strong>締切日は毎月15日</strong></span>となります。'."\r\n"
                    .'<span class="faq_red"><strong>16日以降のご解約申請</strong>に関しては<strong>翌月末の解約</strong></span>となりますので予めご了承ください。'."\r\n"
                    ."\r\n"
                    .'[contact-form-7 id="7"]'."\r\n"
                    ."\r\n"
                    .'[/tab]'."\r\n"
                    ."\r\n"
                    .'[/tabgroup]',
            ],
            'post_title' => [
                'フォーム',
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
                '11-revision-v1',
            ],
            'post_modified' => [
                '2022-10-24 10:26:40',
            ],
            'post_modified_gmt' => [
                '2022-10-24 01:26:40',
            ],
            'post_parent' => [
                11,
            ],
            'guid' => [
                'https://free-max.com/form/?p=13',
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
        'timestamp' => 1669269628,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 13,
        'type' => 'object',
        'timeout' => 1670479228,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/