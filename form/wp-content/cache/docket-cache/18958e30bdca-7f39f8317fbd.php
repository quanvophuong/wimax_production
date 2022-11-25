<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                61,
            ],
            'post_author' => [
                '4',
            ],
            'post_date' => [
                '2022-11-02 17:05:26',
            ],
            'post_date_gmt' => [
                '2022-11-02 08:05:26',
            ],
            'post_content' => [
                'yumiji3156@linqru.jp'."\n"
                    ."\n\n"
                    ."\n"
                    .'<label>IMEI <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span><span style="font-size:smaller;">端末裏面記載の15桁の数字</span>'."\r\n"
                    .'    [text* imei] </label>'."\r\n"
                    ."\r\n"
                    .'<label> お名前 <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\r\n"
                    .'    [text* your_name] </label>'."\r\n"
                    ."\r\n"
                    .'<label> メールアドレス <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\r\n"
                    .'    [email* your_email] </label>'."\r\n"
                    ."\r\n"
                    .'<label> 電話番号'."\r\n"
                    .'    [tel your_tel]</label>'."\r\n"
                    ."\r\n"
                    .'<label> 注文番号 '."\r\n"
                    .'    [text order_id] </label>'."\r\n"
                    ."\r\n"
                    .'<label> 解約の理由<span style="font-size: 80%;">（複数選択可）</span></label>'."\r\n"
                    .'   [checkbox* cancel-reason use_label_element "補償オプション非加入でも心配ない" "補償オプションの月額料金が高い" "補償オプションの内容がいまいち""その他"]'."\r\n"
                    ."\r\n"
                    .'[submit "送信"]'."\n"
                    .'1'."\n"
                    .'安心補償オプションの解約依頼'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'IMEI：[imei]'."\r\n"
                    .'差出人: [your_name] '."\r\n"
                    .'注文番号：[order_id]'."\r\n"
                    .'メールアドレス：[your_email]'."\r\n"
                    .'電話番号：[your_tel]'."\r\n"
                    .'解約の理由：[cancel-reason]'."\r\n"
                    ."\r\n"
                    .'------------------------------'."\r\n"
                    .'■送信情報'."\r\n"
                    .'送信URL：[_url]'."\r\n"
                    .'送信日時：[_date] [_time]'."\r\n"
                    .'IP：[_remote_ip]'."\r\n"
                    .'UA：[_user_agent]'."\n"
                    .'Reply-To: [your_email]'."\n"
                    .'Cc: support@free-max.com'."\n"
                    ."\n\n"
                    ."\n"
                    .'1'."\n"
                    .'[FreeMax+5Gカスタマーサポート] 安心補償オプションの解約依頼を受け付けました。'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'[your_email]'."\n"
                    .'※このメール自動返信メールです。当メールアドレスへの返信はできません。'."\r\n"
                    .'お問い合わせの際は、『お問い合わせフォーム』よりお願いいたします。'."\r\n"
                    ."\r\n"
                    .'[your_name]様'."\r\n"
                    ."\r\n"
                    .'お問い合わせいただきありがとうございます。'."\r\n"
                    .'FreeMax+5Gカスタマーサポートです。'."\r\n"
                    ."\r\n"
                    .'安心補償オプションの解約申請を受付いたしました。'."\r\n"
                    ."\r\n"
                    .'解約日により申請日により解約月が異なりますので、ご確認くださいますようお願い申し上げます。'."\r\n"
                    .'・1～15日までの解約申請 ⇒ 【当月末解約】'."\r\n"
                    .'・16～31日までの解約申請 ⇒ 【翌月末解約】'."\r\n"
                    .'※なお、安心補償オプションへの再加入はできませんので予めご了承ください。'."\r\n"
                    ."\r\n"
                    .'当社にて解約申請の確認を致しましたら、解約日のご連絡をさせていただきます。'."\r\n"
                    ."\r\n"
                    .'何かご不明な点などがございましたら、お気軽にお問い合わせください。'."\r\n"
                    ."\r\n"
                    .'今後とも『FreeMax+5G』をご愛顧いただきますようお願いいたします。'."\n"
                    .'Reply-To: [_site_admin_email]'."\n"
                    ."\n\n"
                    ."\n"
                    .'ありがとうございます。メッセージは送信されました。'."\n"
                    .'メッセージの送信に失敗しました。後でまたお試しください。'."\n"
                    .'入力内容に問題があります。確認して再度お試しください。'."\n"
                    .'メッセージの送信に失敗しました。後でまたお試しください。'."\n"
                    .'メッセージを送信する前に承諾確認が必要です。'."\n"
                    .'必須項目に入力してください。'."\n"
                    .'入力されたテキストが長すぎます。'."\n"
                    .'入力されたテキストが短すぎます。'."\n"
                    .'ファイルのアップロード時に不明なエラーが発生しました。'."\n"
                    .'この形式のファイルはアップロードできません。'."\n"
                    .'ファイルが大きすぎます。'."\n"
                    .'ファイルのアップロード中にエラーが発生しました。'."\n"
                    .'入力されたメールアドレスに間違いがあります。'."\n"
                    .'URL に間違いがあります。'."\n"
                    .'電話番号に間違いがあります。'."\n"
                    .'日付の形式が正しくありません。'."\n"
                    .'選択された日付は早すぎます。'."\n"
                    .'選択された日付は遅すぎます。'."\n"
                    .'数値の形式に間違いがあります。'."\n"
                    .'入力された数値が小さすぎます。'."\n"
                    .'数値が最大許容値を超えています。'."\n"
                    .'クイズの答えが正しくありません。',
            ],
            'post_title' => [
                'HosyouKaiyakuForm',
            ],
            'post_excerpt' => [
                '',
            ],
            'post_status' => [
                'publish',
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
                'contactform_copy',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-11 15:25:58',
            ],
            'post_modified_gmt' => [
                '2022-11-11 06:25:58',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/?post_type=wpcf7_contact_form&#038;p=61',
            ],
            'menu_order' => [
                0,
            ],
            'post_type' => [
                'wpcf7_contact_form',
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
        'timestamp' => 1669262512,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 61,
        'type' => 'object',
        'timeout' => 1670472112,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/