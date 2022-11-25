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
                135,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-11 17:55:49',
            ],
            'post_date_gmt' => [
                '2022-11-11 08:55:49',
            ],
            'post_content' => [
                '[page_header height="0px" margin="23px" type="subnav" align="center" depth="2" bg_color="rgb(255,255,255)" bg_overlay="#4da4fd"]'."\r\n"
                    ."\r\n"
                    .'[row]'."\r\n"
                    ."\r\n"
                    .'[col span__sm="11" divider="0" padding__sm="0px 0px 0px 1px" margin__sm="0px 0px 0px 24px" align="center"]'."\r\n"
                    ."\r\n"
                    .'[button text="契約・解約について" style="outline" expand="0" icon="icon-angle-down" link="#keiyaku"]'."\r\n"
                    ."\r\n"
                    .'[button text="端末について" style="outline" expand="0" icon="icon-angle-down" link="#wifi"]'."\r\n"
                    ."\r\n"
                    .'[button text="接続・通信について" style="outline" icon="icon-angle-down" link="#setuzoku"]'."\r\n"
                    ."\r\n"
                    .'[button text="発送・返却について" style="outline" icon="icon-angle-down" link="#send"]'."\r\n"
                    ."\r\n"
                    .'[button text="その他" style="outline" expand="0" icon="icon-angle-down" link="#other"]'."\r\n"
                    ."\r\n"
                    .'[/col]'."\r\n"
                    ."\r\n"
                    .'[/row]'."\r\n"
                    .'<p style="text-align: center;"> よくある質問の内容はこちら</p>'."\r\n"
                    .'[scroll_to title="契約・解約について" link="#keiyaku"]'."\r\n"
                    .'<h2 style="text-align: center;">契約・解約について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>契約期間の縛り・解約違約金はありますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'最低レンタル期間の1ヵ月が経過した後であればいつでもご解約いただけます。'."\r\n"
                    .'解約違約金は掛かりません。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="端末について" link="#wifi"]'."\r\n"
                    .'<h2 style="text-align: center;">端末について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="発送・返却について" link="#setuzoku"]'."\r\n"
                    .'<h2 style="text-align: center;">接続・通信について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to link="#send"]'."\r\n"
                    .'<h2>発送・返却について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="その他" link="#other"]'."\r\n"
                    .'<h2>その他</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]',
            ],
            'post_title' => [
                'よくある質問',
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
                '87-revision-v1',
            ],
            'post_modified' => [
                '2022-11-11 17:55:49',
            ],
            'post_modified_gmt' => [
                '2022-11-11 08:55:49',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=135',
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
        'timestamp' => 1668504404,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 135,
        'type' => 'object',
        'timeout' => 1669714004,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/