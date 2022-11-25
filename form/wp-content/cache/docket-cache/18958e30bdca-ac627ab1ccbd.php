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
                99,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-11 12:43:29',
            ],
            'post_date_gmt' => [
                '2022-11-11 03:43:29',
            ],
            'post_content' => [
                '[page_header height="0px" margin="23px" type="subnav" align="center" depth="2" bg_size="original"]'."\r\n"
                    ."\r\n"
                    .'[row]'."\r\n"
                    ."\r\n"
                    .'[col span__sm="12" align="center"]'."\r\n"
                    ."\r\n"
                    .'[button text="契約・解約について"]'."\r\n"
                    ."\r\n"
                    .'[button text="端末について" class="#wifi"]'."\r\n"
                    ."\r\n"
                    .'[button text="接続・通信について"]'."\r\n"
                    ."\r\n"
                    .'[button text="Click me!"]'."\r\n"
                    ."\r\n"
                    .'[button text="Click me!" expand="0"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/col]'."\r\n"
                    ."\r\n"
                    .'[/row]'."\r\n"
                    .'<h2> </h2>'."\r\n"
                    .'<h2 style="text-align: center;">契約・解約について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="端末について" link="wifi"]'."\r\n"
                    ."\r\n"
                    .'<h2 style="text-align: center;">端末について</h2>'."\r\n"
                    ."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'<h2 style="text-align: center;">接続・通信について</h2>'."\r\n"
                    ."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="Accordion Item 1 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 2 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="Accordion Item 3 Title"]'."\r\n"
                    ."\r\n"
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
                '2022-11-11 12:43:29',
            ],
            'post_modified_gmt' => [
                '2022-11-11 03:43:29',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=99',
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
        'key' => 99,
        'type' => 'object',
        'timeout' => 1669714004,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/