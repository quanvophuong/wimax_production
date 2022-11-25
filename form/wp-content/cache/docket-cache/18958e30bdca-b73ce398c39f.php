<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                160,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-16 16:00:26',
            ],
            'post_date_gmt' => [
                '2022-11-16 07:00:26',
            ],
            'post_content' => [
                '[page_header height="0px" margin="30px" type="subnav" align="center" depth="2" bg_color="rgb(255,255,255)" bg_overlay="#4da4fd"]'."\r\n"
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
                    .'[ux_text line_height="1.55"]'."\r\n"
                    .'<p style="text-align: center;"><strong>よくある質問はこちら</strong></p>'."\r\n"
                    .'[/ux_text]'."\r\n"
                    .'[divider align="center" width="110px" margin="0.6em"]'."\r\n"
                    ."\r\n"
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
                    .'[accordion-item title="<strong>法人でも利用できますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'はい。ご利用いただけます。'."\r\n"
                    ."\r\n"
                    .'個人様と法人様のお申込みフォームに区別はございませんが、'."\r\n"
                    .'クレジットカードのご名義と同一のお名前にてご契約いただくようお願いいたします。'."\r\n"
                    .'また、お申し込みの際の会社名に御社名をご入力ください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>未成年でも利用できますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'クレジットカード登録が必要な為、親権者の方より契約をお願いします。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>解約方法を教えてください。</strong>"]'."\r\n"
                    ."\r\n"
                    .'必ず当社HP上にあるマイページの『解約手続き』よりご解約申請をお願いいたします。'."\r\n"
                    .'ご解約の締切日は<span style="color: #ff0000;">毎月15日</span>となります。16日以降のご解約依頼に関しては'."\r\n"
                    .'<span style="color: #ff0000;">翌月末のご解約</span>となりますので予めご了承ください。'."\r\n"
                    .'※ご解約フォーム以外からの申請は一切お受けできませんのでご了承ください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>解約申請の取り消しは可能ですか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'可能です。'."\r\n"
                    .'<span style="color: #ff0000;">解約月の20日までに</span>当社ホームページ上のお問い合わせフォームより'."\r\n"
                    .'ご連絡いただくようお願いいたします。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>安心補償オプションを解約したいのですが？</strong>"]'."\r\n"
                    ."\r\n"
                    .'必ず当社HP上にあるマイページの『解約手続き』より安心補償オプション解約の'."\r\n"
                    .'ご解約申請をお願いいたします。'."\r\n"
                    .'ご解約の締切日は<span style="color: #ff0000;">毎月15日</span>となります。'."\r\n"
                    .'16日以降のご解約依頼に関しては<span style="color: #ff0000;">翌月末のご解約</span>となりますので予めご了承ください。'."\r\n"
                    .'※1度ご解約されると再加入はできませんので予めご了承ください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>注文確定後のキャンセルはできますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'はい。商品の発送前であればキャンセルできます。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="端末について" link="#wifi"]'."\r\n"
                    .'<h2 style="text-align: center;">端末について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>対応エリアを教えてください。</strong>"]'."\r\n"
                    ."\r\n"
                    .'下記URLよりご確認ください。'."\r\n"
                    .'<span style="color: #00aae7;"><a style="color: #00aae7;" href="https://www.uqwimax.jp/wimax/area/map/default/" target="_blank" rel="noopener">https://www.uqwimax.jp/wimax/area/map/default/</a></span>'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>ホームルーター の電源はどこにありますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'本製品には電源ボタンがありません。電源を入れるときは電源プラグを'."\r\n"
                    .'コンセントに接続し、ACアダプターを本製品に接続します。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>ホームルーター の使用したデータ通信量は確認できますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'専用アプリ「<span style="color: #ff0000;">ZTELink JP</span>」のダウンロードが必要です。'."\r\n"
                    .'必ずWiFiルーターと接続した状態でアプリを起動してください。'."\r\n"
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
                    .'[accordion-item title="<strong>端末の接続方法を教えてください。</strong>"]'."\r\n"
                    ."\r\n"
                    .'同梱しております説明書の【接続方法】をご確認ください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>速度制限はありますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'一定期間内に大量のデータ通信のご利用があった場合、混雑する時間帯の通信速度を制限する場合があります。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>電波が受信できません・通信速度が遅いです。</strong>"]'."\r\n"
                    ."\r\n"
                    .'<strong>■モバイルルーター</strong>'."\r\n"
                    .'【再起動】'."\r\n"
                    .'電源が入っている状態で電源ボタンを2秒間以上長押しして「再起動のボタン」を選択します。'."\r\n"
                    .'【リセット】'."\r\n"
                    .'①画面左上のメニューアイコンからシステム設定を開き、「リセット」をタップしてください。'."\r\n"
                    .'②リセットボタンをタップし確認画面が表示されたら、リセットを選択します。'."\r\n"
                    .'※リセットを行う度にパスワードが変更されます。'."\r\n"
                    ."\r\n"
                    .'<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #f0f8ff; display:inline-block;"><strong>リセット後の初期設定手順</strong>'."\r\n"
                    .'1. 「日本語」が表示されていることを確認し［開始］をタップ'."\r\n"
                    .'2. ［続行］をタップ'."\r\n"
                    .'3. 「スタンダード（ST）」が選択されていることを確認し［次へ］をタップ'."\r\n"
                    .'4. 「最適化モード」が選択されていることを確認し［次へ］をタップ'."\r\n"
                    .'5. ［スキップ］をタップ'."\r\n"
                    .'6. ［次へ］をタップ'."\r\n"
                    .'7. ［次へ］をタップ'."\r\n"
                    .'8. 「スワイプ」が選択されていることを確認し［次へ］をタップ'."\r\n"
                    .'9. 「自動的にOFFにしない」を選択し［次へ］をタップ'."\r\n"
                    .'10.「OFF」を選択し［次へ］をタップ'."\r\n"
                    .'11.「準備完了」画面で［開始］をタップ'."\r\n"
                    .'12.「デバイスを再起動しますか？」と表示されるので［OK］をタップ'."\r\n"
                    .'※再起動が完了すると、ロック画面（カレンダー）が表示されます。'."\r\n"
                    .'</div>'."\r\n"
                    ."\r\n"
                    .'<strong>■ホームルーター</strong>'."\r\n"
                    .'【リセット】'."\r\n"
                    .'本体底面のRESETボタンを先の細いもので約3秒以上押してください。'."\r\n"
                    .'【強制再起動】'."\r\n"
                    .'1. ACアダプターを本体の電源端子から抜いてください。'."\r\n"
                    .'2. ACアダプターをコンセントから抜き、1分ほど時間を置いてください。'."\r\n"
                    .'3. ACアダプターをコンセントに差してください。'."\r\n"
                    .'4. 本体にACアダプターを接続してください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>Accordion Item 3 Title</strong>"]'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="発送・返却について" link="#send"]'."\r\n"
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
                    .'[/accordion]'."\r\n"
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
                '2022-11-16 16:00:26',
            ],
            'post_modified_gmt' => [
                '2022-11-16 07:00:26',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=160',
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
        'timestamp' => 1668582026,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 160,
        'type' => 'object',
        'timeout' => 1669791626,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/