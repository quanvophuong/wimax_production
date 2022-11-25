<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                178,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-16 16:57:21',
            ],
            'post_date_gmt' => [
                '2022-11-16 07:57:21',
            ],
            'post_content' => [
                '[page_header height="0px" margin="30px" type="subnav" align="center" depth="2" bg_color="rgb(255,255,255)" bg_overlay="#4da4fd"]'."\n"
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
                    .'[ux_text line_height="1.55"]'."\n"
                    ."\n"
                    .'<p style="text-align: center;"><strong>よくある質問はこちら</strong></p>'."\n"
                    .'[/ux_text]'."\n"
                    .'[divider align="center" width="110px" margin="0.6em"]'."\n"
                    ."\n"
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
                    .'<p>必ず当社HP上にあるマイページの『解約手続き』よりご解約申請をお願いいたします。<br />'."\n"
                    .'ご解約の締切日は<span style="color: #ff0000;">毎月15日</span>となります。16日以降のご解約依頼に関しては<br />'."\n"
                    .'<span style="color: #ff0000;">翌月末のご解約</span>となりますので予めご了承ください。<br />'."\n"
                    .'※ご解約フォーム以外からの申請は一切お受けできませんのでご了承ください。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>解約申請の取り消しは可能ですか？</strong>"]'."\n"
                    ."\n"
                    .'<p>可能です。<br />'."\n"
                    .'<span style="color: #ff0000;">解約月の20日までに</span>当社ホームページ上のお問い合わせフォームより<br />'."\n"
                    .'ご連絡いただくようお願いいたします。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>安心補償オプションを解約したいのですが？</strong>"]'."\n"
                    ."\n"
                    .'<p>必ず当社HP上にあるマイページの『解約手続き』より安心補償オプション解約の<br />'."\n"
                    .'ご解約申請をお願いいたします。<br />'."\n"
                    .'ご解約の締切日は<span style="color: #ff0000;">毎月15日</span>となります。<br />'."\n"
                    .'16日以降のご解約依頼に関しては<span style="color: #ff0000;">翌月末のご解約</span>となりますので予めご了承ください。<br />'."\n"
                    .'※1度ご解約されると再加入はできませんので予めご了承ください。</p>'."\n"
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
                    .'<p>下記URLよりご確認ください。<br />'."\n"
                    .'<span style="color: #00aae7;"><a style="color: #00aae7;" href="https://www.uqwimax.jp/wimax/area/map/default/" target="_blank" rel="noopener">https://www.uqwimax.jp/wimax/area/map/default/</a></span></p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>ホームルーター の電源はどこにありますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>本製品には電源ボタンがありません。電源を入れるときは電源プラグを<br />'."\n"
                    .'コンセントに接続し、ACアダプターを本製品に接続します。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>ホームルーター の使用したデータ通信量は確認できますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>専用アプリ「<span style="color: #ff0000;">ZTELink JP</span>」のダウンロードが必要です。<br />'."\n"
                    .'必ずWiFiルーターと接続した状態でアプリを起動してください。</p>'."\n"
                    ."\n"
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
                    .'[accordion-item title="<strong>端末の接続方法を教えてください。</strong>"]'."\n"
                    ."\n"
                    .'<p>同梱しております説明書の【接続方法】をご確認ください。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>速度制限はありますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>一定期間内に大量のデータ通信のご利用があった場合、混雑する時間帯の通信速度を制限する場合があります。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>電波が受信できません・通信速度が遅いです。</strong>"]'."\n"
                    ."\n"
                    .'<p><strong>■モバイルルーター</strong><br />'."\n"
                    .'<strong>【再起動】</strong><br />'."\n"
                    .'電源が入っている状態で電源ボタンを2秒間以上長押しして「再起動のボタン」を選択します。<br />'."\n"
                    .'<strong>【リセット】</strong><br />'."\n"
                    .'①画面左上のメニューアイコンからシステム設定を開き、「リセット」をタップしてください。<br />'."\n"
                    .'②リセットボタンをタップし確認画面が表示されたら、リセットを選択します。<br />'."\n"
                    .'※リセットを行う度にパスワードが変更されます。</p>'."\n"
                    .'<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #f0f8ff; display: inline-block;">'."\n"
                    .'<p style="text-decoration: underline 4px; text-decoration-color: #FFCC00;"><strong>リセット後の初期設定手順</strong></p>'."\n"
                    .'<p>1. 「日本語」が表示されていることを確認し［開始］をタップ<br />'."\n"
                    .'2. ［続行］をタップ<br />'."\n"
                    .'3. 「スタンダード（ST）」が選択されていることを確認し［次へ］をタップ<br />'."\n"
                    .'4. 「最適化モード」が選択されていることを確認し［次へ］をタップ<br />'."\n"
                    .'5. ［スキップ］をタップ<br />'."\n"
                    .'6. ［次へ］をタップ<br />'."\n"
                    .'7. ［次へ］をタップ<br />'."\n"
                    .'8. 「スワイプ」が選択されていることを確認し［次へ］をタップ<br />'."\n"
                    .'9. 「自動的にOFFにしない」を選択し［次へ］をタップ<br />'."\n"
                    .'10.「OFF」を選択し［次へ］をタップ<br />'."\n"
                    .'11.「準備完了」画面で［開始］をタップ<br />'."\n"
                    .'12.「デバイスを再起動しますか？」と表示されるので［OK］をタップ<br />'."\n"
                    .'※再起動が完了すると、ロック画面（カレンダー）が表示されます。</p>'."\n"
                    .'</div>'."\n"
                    .'<p><strong>■ホームルーター</strong><br />'."\n"
                    .'<strong>【リセット】</strong><br />'."\n"
                    .'本体底面のRESETボタンを先の細いもので約3秒以上押してください。<br />'."\n"
                    .'<strong>【強制再起動】</strong><br />'."\n"
                    .'1. ACアダプターを本体の電源端子から抜いてください。<br />'."\n"
                    .'2. ACアダプターをコンセントから抜き、1分ほど時間を置いてください。<br />'."\n"
                    .'3. ACアダプターをコンセントに差してください。<br />'."\n"
                    .'4. 本体にACアダプターを接続してください。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>5Ｇを利用するのに設定は必要ですか？</strong>"]'."\n"
                    ."\n"
                    .'<p>特別な設定は必要ありません。対応のエリアでは自動で5Ｇ接続を開始いたします。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>5Ｇエリア外でも使えますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>使用可能です。その場合、従来の4Ｇ回線エリア内であれば4Ｇ回線でのWiFi通信が可能となります。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>海外でも利用できますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>海外では利用できません。日本国内のみでのサービス提供となります。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>プラスエリアモードは使えますか？</strong>"]'."\n"
                    ."\n"
                    .'<p><span style="color: #ff0000;">ご使用いただけません。</span></p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="発送・返却について" link="#send"]'."\n"
                    ."\n"
                    .'<h2>発送・返却について</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>申し込み当日に発送してもらうことはできますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>平日14時までのお申込みで当日発送が可能です。<br />'."\n"
                    .'※土日祝日は発送を行っていない為、翌営業日の発送となります。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>申し込み後、最短どれくらいで商品が届きますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>お届け先ご住所によって異なりますが、発送日の翌日～３日以内(離島など)で商品が届きます。<br />'."\n"
                    .'※配送日時の指定は承っておりません。<br />'."\n"
                    .'※一部離島・山間部等はこれより遅くなる場合がございます。<br />'."\n"
                    .'※天候や交通状況によって遅れが生じる場合もございます。<br />'."\n"
                    .'※土日祝日は発送業務を行っておりません。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>店舗に直接受取りに行くことはできますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>はい。当社店舗にてお受け取り可能です。<br />'."\n"
                    .'店舗でのご注文はできませんので、必ずお申込みフォームからお手続きをされた上でご来店をお願いいたします。</p>'."\n"
                    .'<p>住所：東京都新宿区 西新宿7-18-19 新宿税理士ビル第二別館佐竹ビル2F<br />'."\n"
                    .'※店舗受け取りは平日10:30～18:00までとなります。<br />'."\n"
                    .'※ご来店の前に必ず来店時間をお知らせください。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>端末の返却方法を教えてください。</strong>"]'."\n"
                    ."\n"
                    .'<p>ご返却にかかる費用は<span style="color: #ff0000;">お客様のご負担</span>となります。<br />'."\n"
                    .'ご返送期日はご解約月の翌月1日午前中までの消印でご発送ください。<br />'."\n"
                    .'※ご解約申請をいただいた後に弊社側から詳細メールをお送りいたします。</p>'."\n"
                    .'<p>追跡のできる配送方法で下記住所にご返送ください。</p>'."\n"
                    .'<p>〒160-0023<br />'."\n"
                    .'東京都新宿区西新宿7-18-19<br />'."\n"
                    .'新宿税理士ビル第二別館佐竹ビル2F<br />'."\n"
                    .'FreeMAX+5G　宛<br />'."\n"
                    .'050-8882-5589</p>'."\n"
                    .'<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #f0f8ff; display: inline-block;">'."\n"
                    .'<p style="text-decoration: underline 4px; text-decoration-color: #FFCC00;"><strong>【返却品内容】</strong></p>'."\n"
                    .'<p>■<strong>モバイルルーターをご契約のお客様</strong><br />'."\n"
                    .'・モバイルルーター本体</p>'."\n"
                    .'<p>■<strong>ホームルーターをご契約のお客様</strong><br />'."\n"
                    .'・ホームルーター本体<br />'."\n"
                    .'・専用ACアダプター</p>'."\n"
                    .'</div>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    ."\n"
                    .'[/accordion]'."\n"
                    .'[scroll_to title="その他" link="#other"]'."\n"
                    ."\n"
                    .'<h2>その他</h2>'."\n"
                    .'[accordion]'."\n"
                    ."\n"
                    .'[accordion-item title="<strong>取扱説明書を無くしました。</strong>"]'."\n"
                    ."\n"
                    .'<p><strong>【モバイルルーター】</strong>こちらよりご確認下さいませ。<br /><strong>【ホームルーター】</strong>こちらよりご確認下さいませ。</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>レンタル品を盗難・紛失または壊してしまいました。</strong>"]'."\n"
                    ."\n"
                    .'<p>回線の一時停止の手続きを行いますので当社までご連絡ください。</p>'."\n"
                    .'<table style="height: 84px; width: 100%; border-collapse: collapse; border-color: #bababa;">'."\n"
                    .'<tbody>'."\n"
                    .'<tr style="border-color: #bababa;">'."\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">区分</span></th>'."\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">安心補償未加入時</span></th>'."\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">安心補償ライト加入時</span></th>'."\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">安心補償フリー加入時</span></th>'."\n"
                    .'</tr>'."\n"
                    .'<tr style="border-color: #bababa;">'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">端末本体（※1）</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">22,000円</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">11,000円（※2）</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">0円（※2）</td>'."\n"
                    .'</tr>'."\n"
                    .'<tr style="border-color: #bababa;">'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">SIMカードのみ</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\n"
                    .'</tr>'."\n"
                    .'<tr style="border-color: #bababa; border-style: solid;">'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">付属品のみ（※3）</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\n"
                    .'</tr>'."\n"
                    .'</tbody>'."\n"
                    .'</table>'."\n"
                    .'<p><span style="font-size: 85%;">※1　端末本体の損害金についてはSIMカードや付属品の有無を問わず同額となります。 </span><br /><span style="font-size: 85%;">※2　盗難・紛失時に警察への届出をいただけない場合や、故障・液晶割れ・水没時に端末の返却が確認できない場合、</span><br /><span style="font-size: 85%;">安心補償オプションの加入の有無にかかわらず損害金として22,000円（税込）をご負担いただきます。 </span><br /><span style="font-size: 85%;">※3　付属品とは、ホームルータープランに付属の専用ACアダプターの事を指します。</span></p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>申し込み後にエリア外で接続できなかった場合、キャンセルできますか？</strong>"]'."\n"
                    ."\n"
                    .'<p>商品到着後、ご利用するエリアでの電波が入りづらかった場合は「対応エリア外による解約」を適用させていただきますので当社までご連絡ください。<br /><br />「対応エリア外による解約」の条件は下記項目となりますので、必ずご確認ください。<br />商品到着から<span style="color: #ff0000;">８日以内</span>に端末をご返却<br />・契約金額から初期費用を除いた金額をご返金<br />・端末返却時の郵送費はお客様のご負担<br />・ご返金時の振込手数料はお客様のご負担<br />・端末の故障・液晶割れ・水没、SIM カードの破損・紛失、専用 AC アダプターの破損・紛失などの場合は適用外<br />・通信量が <span style="color: #ff0000;">5GB 以上</span>利用されていた場合は適用外</p>'."\n"
                    ."\n"
                    .'[/accordion-item]'."\n"
                    .'[accordion-item title="<strong>マイページにログインできません</strong>"]'."\n"
                    ."\n"
                    .'<p>仮パスワードをご登録いただいておりますメールアドレス宛にお送りいたしますので、<br />'."\n"
                    .'当社までご連絡ください。</p>'."\n"
                    ."\n"
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
                '2022-11-16 16:57:21',
            ],
            'post_modified_gmt' => [
                '2022-11-16 07:57:21',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=178',
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
        'timestamp' => 1668585441,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 178,
        'type' => 'object',
        'timeout' => 1669795041,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/