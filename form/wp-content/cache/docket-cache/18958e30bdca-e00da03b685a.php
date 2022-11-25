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
                139,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-11 18:11:03',
            ],
            'post_date_gmt' => [
                '2022-11-11 09:11:03',
            ],
            'post_content' => [
                '[page_header height="0px" margin="23px" type="subnav" align="center" depth="2" bg_color="rgb(255,255,255)" bg_overlay="#4da4fd"]'."\n"
                    ."\n"
                    .'[row]'."\n"
                    ."\n"
                    .'[col span__sm="11" divider="0" padding__sm="0px 0px 0px 1px" margin__sm="0px 0px 0px 24px" align="center"]'."\n"
                    ."\n"
                    .'[button text="契約・解約について" style="outline" expand="0" icon="icon-angle-down" link="#keiyaku"]'."\n"
                    ."\n"
                    .'[button text="端末について" style="outline" expand="0" icon="icon-angle-down" link="#wifi"]'."\n"
                    ."\n"
                    .'[button text="接続・通信について" style="outline" icon="icon-angle-down" link="#setuzoku"]'."\n"
                    ."\n"
                    .'[button text="発送・返却について" style="outline" icon="icon-angle-down" link="#send"]'."\n"
                    ."\n"
                    .'[button text="その他" style="outline" expand="0" icon="icon-angle-down" link="#other"]'."\n"
                    ."\n\n"
                    .'[/col]'."\n"
                    ."\n"
                    .'[/row]'."\n"
                    .'<p style="text-align: center;"> よくある質問の内容はこちら</p>'."\n"
                    .'[scroll_to title="契約・解約について" link="#keiyaku"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">契約・解約について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>契約期間の縛り・解約違約金はありますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>最低レンタル期間の1ヵ月が経過した後であればいつでもご解約いただけます。<br />'."\n"
                    .'解約違約金は掛かりません。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>法人でも利用できますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>はい。ご利用いただけます。</p>'."\n"
                    .'<p>個人様と法人様のお申込みフォームに区別はございませんが、<br />'."\n"
                    .'クレジットカードのご名義と同一のお名前にてご契約いただくようお願いいたします。<br />'."\n"
                    .'また、お申し込みの際の会社名に御社名をご入力ください。</p>'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="端末について" link="#wifi"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">端末について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="発送・返却について" link="#setuzoku"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">接続・通信について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to link="#send"]'."\n"
                    ."\n"
                    .'<h2>発送・返却について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="その他" link="#other"]'."\n"
                    ."\n"
                    .'<h2>その他</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>Accordion Item 1 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 2 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\n"
                    ."\n\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[ux_text font_size="1.35" line_height="0.9" text_align="center"]'."\n"
                    ."\n"
                    .'<p> </p>'."\n"
                    .'<table style="width: 100%; border-collapse: collapse; border-style: solid;">'."\n"
                    .'<tbody>'."\n"
                    .'<tr>'."\n"
                    .'<td style="width: 100%; background-color: #4da4fd; text-align: center;"><strong><a href="https://free-max.com/"><span style="color: #ffff;">【ホームに戻る】</span></a></strong>'."\n"
                    .'<p><strong><a href="https://free-max.com/form/otoiawase/"><span style="color: #ffff;">【お問い合わせフォーム】</span></a></strong></p>'."\n"
                    .'</td>'."\n"
                    .'</tr>'."\n"
                    .'</tbody>'."\n"
                    .'</table>'."\n"
                    .'<p style="text-align: center;"> </p>'."\n"
                    .'[/ux_text]',
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
                '2022-11-11 18:11:03',
            ],
            'post_modified_gmt' => [
                '2022-11-11 09:11:03',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=139',
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
        'key' => 139,
        'type' => 'object',
        'timeout' => 1669714004,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/