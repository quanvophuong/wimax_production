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
                91,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-11 11:44:24',
            ],
            'post_date_gmt' => [
                '2022-11-11 02:44:24',
            ],
            'post_content' => [
                '[page_header height="0px" margin="23px" type="subnav" align="center" depth="2" bg_size="original"]'."\n"
                    ."\n"
                    .'[button text="Click me!" expand="0"]'."\n"
                    ."\n"
                    .'[button text="Click me!"]'."\n"
                    ."\n"
                    .'[button text="Click me!"]'."\n"
                    ."\n"
                    .'[button text="Click me!"]'."\n"
                    ."\n"
                    .'[button text="Click me!"]'."\n"
                    ."\n"
                    .'<h2> </h2>'."\n"
                    .'<h2 style="text-align: center;">契約・解約について</h2>'."\n"
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
                '2022-11-11 11:44:24',
            ],
            'post_modified_gmt' => [
                '2022-11-11 02:44:24',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=91',
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
        'key' => 91,
        'type' => 'object',
        'timeout' => 1669714004,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/