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
                59,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-02 17:02:16',
            ],
            'post_date_gmt' => [
                '2022-11-02 08:02:16',
            ],
            'post_content' => [
                '[tabgroup title="お問い合わせ内容を選択してください" style="tabs" class="cloudwifi-inquiry"]'."\n"
                    ."\n"
                    .'[tab title="端末の解約"]'."\n"
                    ."\n"
                    .'[row]'."\n"
                    ."\n"
                    .'[col span__sm="12"]'."\n"
                    ."\n"
                    .'<p>※<strong>当月</strong><strong>解約の</strong><span class="faq_red"><strong>締切日は<span style="color: #ed1c24;">毎月15日</span></strong></span>となります。<br /><span class="faq_red"><strong>16日以降のご解約申請</strong>に関しては<strong>翌月末の解約</strong></span>となりますので予めご了承ください。<br />※安心補償オプションにご加入されているお客様は、「<strong>安心補償オプションの解約</strong>」のご申請は必要ございません。</p>'."\n"
                    ."\n"
                    .'[/col]'."\n"
                    ."\n"
                    .'[/row]'."\n"
                    .'<p><strong>IMEIの確認方法</strong></p>'."\n"
                    .'[row]'."\n"
                    ."\n"
                    .'[col span="6" span__sm="12"]'."\n"
                    ."\n"
                    .'<p><strong>【<span style="color: #4da4fd;">Galaxy 5G Mobile Wi-Fi</span>】</strong></p>'."\n"
                    .'[ux_image id="50" image_size="medium" width="70"]'."\n"
                    ."\n\n"
                    .'[/col]'."\n"
                    .'[col span="6" span__sm="12"]'."\n"
                    ."\n"
                    .'<p><strong>【<span style="color: #4da4fd;">Speed Wi-Fi HOME 5G L11</span>】</strong></p>'."\n"
                    .'[ux_image id="51" width="70"]'."\n"
                    ."\n\n"
                    .'[/col]'."\n"
                    ."\n"
                    .'[/row]'."\n"
                    .'[contact-form-7 id="9"]'."\n"
                    ."\n\n"
                    .'[/tab]'."\n"
                    ."\n"
                    .'[/tabgroup]',
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
                '11-revision-v1',
            ],
            'post_modified' => [
                '2022-11-02 17:02:16',
            ],
            'post_modified_gmt' => [
                '2022-11-02 08:02:16',
            ],
            'post_parent' => [
                11,
            ],
            'guid' => [
                'https://free-max.com/form/?p=59',
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
        'key' => 59,
        'type' => 'object',
        'timeout' => 1670479228,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/