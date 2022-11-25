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
                116,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-11 13:13:11',
            ],
            'post_date_gmt' => [
                '2022-11-11 04:13:11',
            ],
            'post_content' => [
                '[page_header height="0px" margin="23px" type="subnav" align="center" depth="2" bg_size="original"]'."\n"
                    ."\n"
                    .'[row]'."\n"
                    ."\n"
                    .'[col span__sm="12" align="center"]'."\n"
                    ."\n"
                    .'[button text="契約・解約について" style="outline" link="#keiyaku"]'."\n"
                    ."\n"
                    .'[button text="端末について" style="outline" link="#wifi"]'."\n"
                    ."\n"
                    .'[button text="接続・通信について" style="outline" link="#setuzoku"]'."\n"
                    ."\n"
                    .'[button text="発送・返却について" style="outline" link="#send"]'."\n"
                    ."\n"
                    .'[button text="その他" style="outline" expand="0" link="#other"]'."\n"
                    ."\n\n"
                    .'[/col]'."\n"
                    ."\n"
                    .'[/row]'."\n"
                    .'[scroll_to title="契約・解約について" link="#keiyaku"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">契約・解約について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="契約期間の縛り・解約違約金はありますか？"]'."\n"
                    ."\n"
                    .'<p>最低レンタル期間の1ヵ月が経過した後であればいつでもご解約いただけます。<br />解約違約金は掛かりません。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="端末について" link="#wifi"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">端末について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="発送・返却について" link="#setuzoku"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">接続・通信について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to link="#send"]'."\n"
                    ."\n"
                    .'<h2>発送・返却について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="その他" link="#other"]'."\n"
                    ."\n"
                    .'<h2>その他</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
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
                '2022-11-11 13:13:11',
            ],
            'post_modified_gmt' => [
                '2022-11-11 04:13:11',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=116',
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
        'key' => 116,
        'type' => 'object',
        'timeout' => 1669714004,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/