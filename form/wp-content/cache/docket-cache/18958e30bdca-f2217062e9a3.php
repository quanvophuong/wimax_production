<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                149,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-15 18:34:51',
            ],
            'post_date_gmt' => [
                '2022-11-15 09:34:51',
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
                    .'<p style="text-align: center;"><strong> よくある質問の内容はこちら</strong></p>'."\n"
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
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>未成年でも利用できますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>クレジットカード登録が必要な為、親権者の方より契約をお願いします。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>解約方法を教えてください。</strong>"]'."\n"
                    ."\n"
                    .'<p>必ず当社HP上にあるマイページの『解約手続き』よりご解約申請をお願いいたします。<br />ご解約の締切日は<span style="color: #ff0000;">毎月15日</span>となります。16日以降のご解約依頼に関しては<br /><span style="color: #ff0000;">翌月末のご解約</span>となりますので予めご了承ください。<br />※ご解約フォーム以外からの申請は一切お受けできませんのでご了承ください。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>解約申請の取り消しは可能ですか？</strong>"]'."\n"
                    ."\n"
                    .'<p>可能です。<br /><span style="color: #ff0000;">解約月の20日までに</span>当社ホームページ上のお問い合わせフォームより<br />ご連絡いただくようお願いいたします。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>安心補償オプションを解約したいのですが？</strong>"]'."\n"
                    ."\n"
                    .'<p>必ず当社HP上にあるマイページの『解約手続き』より安心補償オプション解約の<br />ご解約申請をお願いいたします。<br />ご解約の締切日は<span style="color: #ff0000;">毎月15日</span>となります。<br />16日以降のご解約依頼に関しては<span style="color: #ff0000;">翌月末のご解約</span>となりますので予めご了承ください。<br />※1度ご解約されると再加入はできませんので予めご了承ください。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>注文確定後のキャンセルはできますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>はい。商品の発送前であればキャンセルできます。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="端末について" link="#wifi"]'."\n"
                    ."\n"
                    .'<h2 style="text-align: center;">端末について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>対応エリアを教えてください。</strong>"]'."\n"
                    ."\n"
                    .'<p>下記URLよりご確認ください。<br /><span style="color: #00aae7;"><a style="color: #00aae7;" href="https://www.uqwimax.jp/wimax/area/map/default/" target="_blank" rel="noopener">https://www.uqwimax.jp/wimax/area/map/default/</a></span></p>'."\n"
                    ."\n"
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
                    .'[divider align="center" width="300px"]',
            ],
            'post_title' => [
                'よくある質問',
            ],
            'post_excerpt' => [
                '',
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
            'post_password' => [
                '',
            ],
            'post_name' => [
                '87-revision-v1',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-15 18:34:51',
            ],
            'post_modified_gmt' => [
                '2022-11-15 09:34:51',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=149',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'revision',
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
        'timestamp' => 1668504891,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 149,
        'type' => 'object',
        'timeout' => 1669714491,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/