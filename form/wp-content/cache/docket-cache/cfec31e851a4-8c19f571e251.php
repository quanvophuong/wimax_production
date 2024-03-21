<?php 
return array (
  'timestamp' => 1680017587,
  'site_id' => 1,
  'group' => 'post_meta',
  'key' => 263,
  'type' => 'array',
  'timeout' => 1681227187,
  'data' => 
  array (
    '_kintone_setting_data' => 
    array (
      0 => 
      array (
        'domain' => '',
        'email_address_to_send_kintone_registration_error' => 'yumiji3156@linqru.jp',
        'kintone_basic_authentication_id' => '',
        'kintone_basic_authentication_password' => '',
        'kintone_guest_space_id' => '',
        'app_datas' => 
        array (
        ),
      ),
    ),
    '_form' => 
    array (
      0 => '<h4>お客様情報</h4>
<label> ■注文番号</label>
[text* order_id]</label>

<label> ■お名前</label>
[text* myname]</label>

<label> ■メールアドレス</label>
    [email* email] </label>

<label> ■年齢</label>
  [number* nenrei min:18 max:120]</label>

<p><strong>口座情報</strong><p>
<label> ■銀行名</label>
    [text* bank]</label>

<label> ■支店名</label>
    [text* branch]</label>

<label> ■口座番号</label>
[number kouzabangou min:0000000 max:9999999]</label>

<label> ■口座番名義</label>
[text* kouzameigi]</label>

<h4>ご契約について</h4>
<label><font size="4">■当サービスをどこでお知りになりましたか？</font></label>
<span style="font-size: 80%;"><strong>（複数選択可）</strong></span>
[checkbox* hearing use_label_element "Web" "SNS" "動画広告" "知人" "友人からのご紹介・リピート" "当社HP" "比較サイト" ]</label>

<label><font size="4">■当サービスをご契約いただいたご理由</font> </label>
    [textarea* keiyakuriyuu]</label>

<label><font size="4">■他社サービスと比較されましたか？</font></label>
[radio tasyahikaku use_label_element default:1 "はい" "いいえ"]</label>
[group tasyahai]<small>他社サービス名をご入力ください</small>[text* tasyahai][/group]

<label><font size="4">■過去に利用されたことのあるネット回線について</font></label>
[radio pastriyou use_label_element default:1 "ある" "ない"]
[group past]<small>利用されたネット回線をご入力ください</small>[text* past][/group]

<label><font size="4">■利用用途について</font>
<span style="font-size: 80%;"><strong>（複数選択可）</strong></span></label>
[checkbox* youto use_label_element "テレワーク" "動画視聴" "ネット検索" "オンラインゲーム" "出張" "固定回線の代わり" "SNS" "その他"]</label>
[group youtosonota]<small>利用用途をご入力ください</small>[text* youtosonota][/group]


<label><font size="4">■月にどれくらいデータ通信量を使用されますか？</font></label>
[radio tukidorekurai use_label_element default:1 "0~10GB" "10~30GB" "30~50GB" "50~100GB" "100~200GB" "それ以上"]

<label> <font size="4">■WiFiを接続されたデバイスについて</font></label>
<span style="font-size: 80%;"><strong>（複数選択可）</strong></span> 
[checkbox* setuzokusaki use_label_element "スマートフォン" "タブレット" "パソコン" "ゲーム機" "テレビ" "カメラ" "その他"]</label>
[group setuzokusakihsonota]<small>接続されたデバイスをご入力ください</small>[text* setuzokusakihsonota][/group]

<h4>ご利用状況について</h4>
<label> <font size="4">■レンタルWiFiに求めるものは何ですか？</font><span style="font-size: 80%;">（複数選択可）</span></label>
[checkbox* motomeru use_label_element "データ通信量" "通信速度" "対応エリア" "料金" "契約期間" "端末" "実店舗がある" "サポート" "データチャージ" "その他"]
[group motomerusonota]<small>レンタルWiFiに求めるものをご入力ください</small>[text* motomerusonota][/group]

<label><font size="4">■海外で使用できるWiFiがあったら利用したいと思いますか？</font></label>
[radio kaigai use_label_element default:1 "はい" "いいえ"]

<label> <font size="4">■オプションサービスで合ったらいいと思うサービスについて</font><span style="font-size: 80%;">（複数選択可）</span></label>
[checkbox* option use_label_element "動画配信" "漫画読み放題" "動画広告ブロックサービス" "スマホ保険" "スマホコンシェル" "その他"]
[group optionsonota]<small>オプションサービスで合ったらいいと思うサービスをご入力ください</small>[text* optionsonota][/group]

<label><font size="4">■当サービスの不満な点、改善してほしい点</font>
    [textarea* kaizen]</label>

<label><font size="4">■当サービスに関する満足度</font></label>
[radio manzokudo use_label_element default:1 "20%" "40%" "60%" "80%" "100%"]


[submit "送信"]
[multistep thanks first_step last_step send_email "https://free-max.com/form/cashback-thanks/"]',
    ),
    '_mail' => 
    array (
      0 => 
      array (
        'active' => true,
        'subject' => '【FreeMax+5G キャッシュバック特典】アンケートを受け付けいたしました。',
        'sender' => 'FreeMax+5G <cb@free-max.com>',
        'recipient' => 'FreeMax+5G <cb@free-max.com>',
        'body' => '【FreeMax+5G キャッシュバック特典】アンケートフォーム

お客様情報
■注文番号: [order_id]
■メールアドレス：[email] 
■お名前：[myname] 
--口座情報--
■銀行名：[bank]
■支店名：[branch]
■口座番号：[kouzabangou]
■口座番名義：[kouzameigi]


ご契約について
■当サービスをどこでお知りになりましたか？：[hearing]
■当サービスをご契約いただいたご理由：[keiyakuriyuu]
■他社サービスと比較されましたか？：[tasyahikaku] [tasyahai]
■過去に利用されたことのあるネット回線について：[pastriyou] [past]
■利用用途について：[youto] [youtosonota]
■月にどれくらいデータ通信量を使用されますか？：[tukidorekurai]
■WiFiを接続されたデバイスについて（複数選択可）：[setuzokusaki] [setuzokusakihsonota]

ご利用状況について
■レンタルWiFiに求めるものは何ですか？：[motomeru]
■海外で使用できるWiFiがあったら利用したいと思いますか？：[kaigai]
■オプションサービスで合ったらいいと思うサービスについて：[option] [optionsonota]
■当サービスの不満な点、改善してほしい点：[kaizen]
■当サービスに関する満足度：[manzokudo]

------------------------------
■送信情報
送信URL：[_url]
送信日：[_date] 
送信時間：[_time]
IP：[_remote_ip]

-- 
このメールは [_site_title] ([_site_url]) のアンケートフォームから送信されました',
        'additional_headers' => '',
        'attachments' => '',
        'use_html' => false,
        'exclude_blank' => false,
      ),
    ),
    '_mail_2' => 
    array (
      0 => 
      array (
        'active' => true,
        'subject' => '【FreeMax+5G キャッシュバック特典】アンケートを受け付けいたしました。',
        'sender' => 'FreeMax+5G <cb@free-max.com>',
        'recipient' => '[email]',
        'body' => '※このメール自動返信メールです。当メールアドレスへの返信はできません。

[myname]様

お世話になっております。
FreeMax+5Gカスタマーサポートです。

この度は、アンケートへのご回答ありがとうございました。

ご回答いただきました内容は下記の通りとなります。
【FreeMax+5G キャッシュバック特典】アンケートフォーム

お客様情報
■注文番号: [order_id]
■メールアドレス：[email] 
■お名前：[myname] 
--口座情報--
■銀行名：[bank]
■支店名：[branch]
■口座番号：[kouzabangou]
■口座番名義：[kouzameigi]


ご契約について
■当サービスをどこでお知りになりましたか？：[hearing]
■当サービスをご契約いただいたご理由：[keiyakuriyuu]
■他社サービスと比較されましたか？：[tasyahikaku] [tasyahai]
■過去に利用されたことのあるネット回線について：[pastriyou] [past]
■利用用途について：[youto] [youtosonota]
■月にどれくらいデータ通信量を使用されますか？：[tukidorekurai]
■WiFiを接続されたデバイスについて（複数選択可）：[setuzokusaki] [setuzokusakihsonota]

ご利用状況について
■レンタルWiFiに求めるものは何ですか？：[motomeru]
■海外で使用できるWiFiがあったら利用したいと思いますか？：[kaigai]
■オプションサービスで合ったらいいと思うサービスについて：[option] [optionsonota]
■当サービスの不満な点、改善してほしい点：[kaizen]
■当サービスに関する満足度：[manzokudo]

-- 
このメールは [_site_title] ([_site_url]) のFreeMax+5G アンケートフォームから送信されました',
        'additional_headers' => 'Reply-To: [_site_admin_email]',
        'attachments' => '',
        'use_html' => false,
        'exclude_blank' => false,
      ),
    ),
    '_messages' => 
    array (
      0 => 
      array (
        'mail_sent_ok' => 'ありがとうございます。メッセージは送信されました。',
        'mail_sent_ng' => 'メッセージの送信に失敗しました。後でまたお試しください。',
        'validation_error' => '入力内容に問題があります。確認して再度お試しください。',
        'spam' => 'メッセージの送信に失敗しました。後でまたお試しください。',
        'accept_terms' => 'メッセージを送信する前に承諾確認が必要です。',
        'invalid_required' => '必須項目に入力してください。',
        'invalid_too_long' => '入力されたテキストが長すぎます。',
        'invalid_too_short' => '入力されたテキストが短すぎます。',
        'invalid_first_step' => 'Please fill out the form on the previous page.',
        'upload_failed' => 'ファイルのアップロード時に不明なエラーが発生しました。',
        'upload_file_type_invalid' => 'この形式のファイルはアップロードできません。',
        'upload_file_too_large' => 'ファイルが大きすぎます。',
        'upload_failed_php_error' => 'ファイルのアップロード中にエラーが発生しました。',
        'invalid_email' => '入力されたメールアドレスに間違いがあります。',
        'invalid_url' => 'URL に間違いがあります。',
        'invalid_tel' => '電話番号に間違いがあります。',
        'invalid_date' => '日付の形式が正しくありません。',
        'date_too_early' => '選択された日付は早すぎます。',
        'date_too_late' => '選択された日付は遅すぎます。',
        'invalid_number' => '数値の形式に間違いがあります。',
        'number_too_small' => '入力された数値が小さすぎます。',
        'number_too_large' => '数値が最大許容値を超えています。',
        'quiz_answer_not_correct' => 'クイズの答えが正しくありません。',
      ),
    ),
    '_additional_settings' => 
    array (
      0 => '',
    ),
    '_locale' => 
    array (
      0 => 'ja',
    ),
    'wpcf7cf_options' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'then_field' => 'tasyahai',
          'and_rules' => 
          array (
            0 => 
            array (
              'if_field' => 'tasyahikaku',
              'operator' => 'equals',
              'if_value' => 'はい',
            ),
          ),
        ),
        1 => 
        array (
          'then_field' => 'setuzokusakihsonota',
          'and_rules' => 
          array (
            0 => 
            array (
              'if_field' => 'setuzokusaki',
              'operator' => 'equals',
              'if_value' => 'その他',
            ),
          ),
        ),
        2 => 
        array (
          'then_field' => 'youtosonota',
          'and_rules' => 
          array (
            0 => 
            array (
              'if_field' => 'youto',
              'operator' => 'equals',
              'if_value' => 'その他',
            ),
          ),
        ),
        3 => 
        array (
          'then_field' => 'past',
          'and_rules' => 
          array (
            0 => 
            array (
              'if_field' => 'pastriyou',
              'operator' => 'equals',
              'if_value' => 'ある',
            ),
          ),
        ),
        4 => 
        array (
          'then_field' => 'motomerusonota',
          'and_rules' => 
          array (
            0 => 
            array (
              'if_field' => 'motomeru',
              'operator' => 'equals',
              'if_value' => 'その他',
            ),
          ),
        ),
        5 => 
        array (
          'then_field' => 'optionsonota',
          'and_rules' => 
          array (
            0 => 
            array (
              'if_field' => 'option',
              'operator' => 'equals',
              'if_value' => 'その他',
            ),
          ),
        ),
      ),
    ),
    'gs_settings' => 
    array (
      0 => 
      array (
        'sheet-name' => 'FM-キャッシュバッククーポン',
        'sheet-tab-name' => 'クーポンコード返信反映',
      ),
    ),
    'gs_map_special_mail_tags' => 
    array (
      0 => 
      array (
        'date' => '送信日',
        'time' => '送信時間',
      ),
    ),
    'gs_map_custom_mail_tags' => 
    array (
      0 => 
      array (
      ),
    ),
    'gs_map_mail_tags' => 
    array (
      0 => 
      array (
        'order_id' => '注文番号',
        'myname' => 'お名前',
        'email' => 'メールアドレス',
        'bank' => '銀行名',
        'branch' => '支店名',
        'kouzabangou' => '口座番号',
        'kouzameigi' => '口座名義',
      ),
    ),
    'gs_custom_header_tags' => 
    array (
      0 => 
      array (
        0 => '注文番号',
        1 => '送信日',
        2 => '送信時間',
        3 => 'お名前',
        4 => 'メールアドレス',
        5 => '銀行名',
        6 => '支店名',
        7 => '口座番号',
        8 => '口座名義',
      ),
    ),
    'cf7_gs_misc_options' => 
    array (
      0 => 
      array (
        'header_color' => '',
        'odd_color' => '',
        'even_color' => '',
        'sorting_column' => '',
        'sorting_order' => 'ASCENDING',
      ),
    ),
  ),
);
/*@DOCKET_CACHE_EOF*/