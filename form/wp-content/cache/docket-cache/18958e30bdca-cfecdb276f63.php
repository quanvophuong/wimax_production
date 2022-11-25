<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                190,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-17 18:04:36',
            ],
            'post_date_gmt' => [
                '2022-11-17 09:04:36',
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
                    .'<strong>【再起動】</strong>'."\r\n"
                    .'電源が入っている状態で電源ボタンを2秒間以上長押しして「再起動のボタン」を選択します。'."\r\n"
                    .'<strong>【リセット】</strong>'."\r\n"
                    .'①画面左上のメニューアイコンからシステム設定を開き、「リセット」をタップしてください。'."\r\n"
                    .'②リセットボタンをタップし確認画面が表示されたら、リセットを選択します。'."\r\n"
                    .'※リセットを行う度にパスワードが変更されます。'."\r\n"
                    .'<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #f0f8ff; display: inline-block;">'."\r\n"
                    .'<p style="text-decoration: underline 4px; text-decoration-color: #FFCC00;"><strong>リセット後の初期設定手順</strong></p>'."\r\n"
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
                    ."\r\n"
                    .'</div>'."\r\n"
                    .'<strong>■ホームルーター</strong>'."\r\n"
                    .'<strong>【リセット】</strong>'."\r\n"
                    .'本体底面のRESETボタンを先の細いもので約3秒以上押してください。'."\r\n"
                    .'<strong>【強制再起動】</strong>'."\r\n"
                    .'1. ACアダプターを本体の電源端子から抜いてください。'."\r\n"
                    .'2. ACアダプターをコンセントから抜き、1分ほど時間を置いてください。'."\r\n"
                    .'3. ACアダプターをコンセントに差してください。'."\r\n"
                    .'4. 本体にACアダプターを接続してください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>5Ｇを利用するのに設定は必要ですか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'特別な設定は必要ありません。対応のエリアでは自動で5Ｇ接続を開始いたします。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>5Ｇエリア外でも使えますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'使用可能です。その場合、従来の4Ｇ回線エリア内であれば4Ｇ回線でのWiFi通信が可能となります。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>海外でも利用できますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'海外では利用できません。日本国内のみでのサービス提供となります。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>プラスエリアモードは使えますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'<span style="color: #ff0000;">ご使用いただけません。</span>'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="発送・返却について" link="#send"]'."\r\n"
                    .'<h2>発送・返却について</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>申し込み当日に発送してもらうことはできますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'平日14時までのお申込みで当日発送が可能です。'."\r\n"
                    .'※土日祝日は発送を行っていない為、翌営業日の発送となります。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>申し込み後、最短どれくらいで商品が届きますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'お届け先ご住所によって異なりますが、発送日の翌日～３日以内(離島など)で商品が届きます。'."\r\n"
                    .'※配送日時の指定は承っておりません。'."\r\n"
                    .'※一部離島・山間部等はこれより遅くなる場合がございます。'."\r\n"
                    .'※天候や交通状況によって遅れが生じる場合もございます。'."\r\n"
                    .'※土日祝日は発送業務を行っておりません。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>店舗に直接受取りに行くことはできますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'はい。当社店舗にてお受け取り可能です。'."\r\n"
                    .'店舗でのご注文はできませんので、必ずお申込みフォームからお手続きをされた上でご来店をお願いいたします。'."\r\n"
                    ."\r\n"
                    .'住所：東京都新宿区 西新宿7-18-19 新宿税理士ビル第二別館佐竹ビル2F'."\r\n"
                    .'※店舗受け取りは平日10:30～18:00までとなります。'."\r\n"
                    .'※ご来店の前に必ず来店時間をお知らせください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>端末の返却方法を教えてください。</strong>"]'."\r\n"
                    ."\r\n"
                    .'ご返却にかかる費用は<span style="color: #ff0000;">お客様のご負担</span>となります。'."\r\n"
                    .'ご返送期日はご解約月の翌月1日午前中までの消印でご発送ください。'."\r\n"
                    .'※ご解約申請をいただいた後に弊社側から詳細メールをお送りいたします。'."\r\n"
                    ."\r\n"
                    .'追跡のできる配送方法で下記住所にご返送ください。'."\r\n"
                    ."\r\n"
                    .'〒160-0023'."\r\n"
                    .'東京都新宿区西新宿7-18-19'."\r\n"
                    .'新宿税理士ビル第二別館佐竹ビル2F'."\r\n"
                    .'FreeMAX+5G　宛'."\r\n"
                    .'050-8882-5589'."\r\n"
                    .'<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #f0f8ff; display: inline-block;">'."\r\n"
                    .'<p style="text-decoration: underline 4px; text-decoration-color: #FFCC00;"><strong>【返却品内容】</strong></p>'."\r\n"
                    .'■<strong>モバイルルーターをご契約のお客様</strong>'."\r\n"
                    .'・モバイルルーター本体'."\r\n"
                    ."\r\n"
                    .'■<strong>ホームルーターをご契約のお客様</strong>'."\r\n"
                    .'・ホームルーター本体'."\r\n"
                    .'・専用ACアダプター'."\r\n"
                    ."\r\n"
                    .'</div>'."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[scroll_to title="その他" link="#other"]'."\r\n"
                    .'<h2>その他</h2>'."\r\n"
                    .'[accordion]'."\r\n"
                    ."\r\n"
                    .'[accordion-item title="<strong>取扱説明書を無くしました。</strong>"]'."\r\n"
                    ."\r\n"
                    .'<strong>【モバイルルーター】</strong>こちらよりご確認下さいませ。'."\r\n"
                    .'<strong>【ホームルーター】</strong>こちらよりご確認下さいませ。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>レンタル品を盗難・紛失または壊してしまいました。</strong>"]'."\r\n"
                    ."\r\n"
                    .'回線の一時停止の手続きを行いますので当社までご連絡ください。'."\r\n"
                    .'<table style="height: 84px; width: 100%; border-collapse: collapse; border-color: #bababa;">'."\r\n"
                    .'<tbody>'."\r\n"
                    .'<tr style="border-color: #bababa;">'."\r\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">区分</span></th>'."\r\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">安心補償未加入時</span></th>'."\r\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">安心補償ライト加入時</span></th>'."\r\n"
                    .'<th style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center; background-color: #1b68ab;"><span style="color: #ffffff;">安心補償フリー加入時</span></th>'."\r\n"
                    .'</tr>'."\r\n"
                    .'<tr style="border-color: #bababa;">'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">端末本体（※1）</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">22,000円</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">11,000円（※2）</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">0円（※2）</td>'."\r\n"
                    .'</tr>'."\r\n"
                    .'<tr style="border-color: #bababa;">'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">SIMカードのみ</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\r\n"
                    .'</tr>'."\r\n"
                    .'<tr style="border-color: #bababa; border-style: solid;">'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">付属品のみ（※3）</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\r\n"
                    .'<td style="width: 25%; border-color: #bababa; height: 21px; border-style: solid; text-align: center;">6,600円</td>'."\r\n"
                    .'</tr>'."\r\n"
                    .'</tbody>'."\r\n"
                    .'</table>'."\r\n"
                    .'<span style="font-size: 85%;">※1　端末本体の損害金についてはSIMカードや付属品の有無を問わず同額となります。 </span>'."\r\n"
                    .'<span style="font-size: 85%;">※2　盗難・紛失時に警察への届出をいただけない場合や、故障・液晶割れ・水没時に端末の返却が確認できない場合、</span>'."\r\n"
                    .'<span style="font-size: 85%;">安心補償オプションの加入の有無にかかわらず損害金として22,000円（税込）をご負担いただきます。 </span>'."\r\n"
                    .'<span style="font-size: 85%;">※3　付属品とは、ホームルータープランに付属の専用ACアダプターの事を指します。</span>'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>申し込み後にエリア外で接続できなかった場合、キャンセルできますか？</strong>"]'."\r\n"
                    ."\r\n"
                    .'商品到着後、ご利用するエリアでの電波が入りづらかった場合は「対応エリア外による解約」を適用させていただきますので当社までご連絡ください。'."\r\n"
                    .'<p style="text-decoration: underline 4px; text-decoration-color: #FFCC00;"><strong>「対応エリア外による解約」の条件は下記項目となりますので、必ずご確認ください。</strong></p>'."\r\n"
                    ."\r\n"
                    .'<div style="padding: 10px; margin-bottom: 10px; border: 1px solid #333333; background-color: #f0f8ff; display: inline-block;">・商品到着から<span style="color: #ff0000;">８日以内</span>に端末をご返却'."\r\n"
                    .'・契約金額から初期費用を除いた金額をご返金'."\r\n"
                    .'・端末返却時の郵送費はお客様のご負担'."\r\n"
                    .'・ご返金時の振込手数料はお客様のご負担'."\r\n"
                    .'・端末の故障・液晶割れ・水没、SIM カードの破損・紛失、専用 AC アダプターの破損・紛失などの場合は適用外'."\r\n"
                    .'・通信量が <span style="color: #ff0000;">5GB 以上</span>利用されていた場合は適用外[/accordion-item]'."\r\n"
                    .'[accordion-item title="<strong>マイページにログインできません</strong>"]仮パスワードをご登録いただいておりますメールアドレス宛にお送りいたしますので、'."\r\n"
                    .'当社までご連絡ください。'."\r\n"
                    ."\r\n"
                    .'[/accordion-item]'."\r\n"
                    ."\r\n"
                    .'[/accordion]'."\r\n"
                    .'[divider align="center" width="300px"]'."\r\n"
                    ."\r\n"
                    .'</div>',
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
                '2022-11-17 18:04:36',
            ],
            'post_modified_gmt' => [
                '2022-11-17 09:04:36',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                87,
            ],
            'guid' => [
                'https://free-max.com/form/?p=190',
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
        'timestamp' => 1668675876,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 190,
        'type' => 'object',
        'timeout' => 1669885476,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/