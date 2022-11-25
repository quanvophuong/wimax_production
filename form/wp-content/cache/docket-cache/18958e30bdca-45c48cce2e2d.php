<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                9,
            ],
            'post_author' => [
                '3',
            ],
            'post_date' => [
                '2022-10-24 10:22:55',
            ],
            'post_date_gmt' => [
                '2022-10-24 01:22:55',
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
                    .'<label> 電話番号 <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\r\n"
                    .'    [tel* your_tel] </label>'."\r\n"
                    ."\r\n"
                    .'<label> 注文番号 '."\r\n"
                    .'    [text order_id] </label>'."\r\n"
                    ."\r\n"
                    .'<label> 解約の理由<span style="font-size: 80%;">（複数選択可）</span><span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span></label>'."\r\n"
                    .'   [checkbox* cancel_reason use_label_element "Wifiを使う必要がなくなった" "エリア範囲外だった" "速度が遅かった" "他社への乗り換え" "料金に不満" "サポートの対応が悪かった"]'."\r\n"
                    ."\r\n"
                    .'<label> 今後のサービス向上のために悪かった点を教えてください'."\r\n"
                    .'    [textarea cancel_fb_message] </label>'."\r\n"
                    ."\r\n"
                    .'<label> その他ご意見・ご感想を教えてください'."\r\n"
                    .'    [textarea cancel_other_message] </label>'."\r\n"
                    ."\r\n"
                    .'[submit "送信する"]'."\n"
                    .'1'."\n"
                    .'端末の解約:[imei]:[your_name]'."\n"
                    .'FreeMax+5G <kaiyaku@free-max.com>'."\n"
                    .'FreeMax+5G <kaiyaku@free-max.com>'."\n"
                    .'IMEI：[imei]'."\r\n"
                    .'差出人: [your_name] '."\r\n"
                    .'注文番号：[order_id]'."\r\n"
                    .'メールアドレス：[your_email]'."\r\n"
                    .'電話番号：[your_tel]'."\r\n"
                    .'解約の理由：[cancel_reason]'."\r\n"
                    .'今後のサービス向上のために悪かった点を教えてください:'."\r\n"
                    .'[cancel_fb_message]'."\r\n"
                    .'その他ご意見・ご感想を教えてください：'."\r\n"
                    .'[cancel_other_message]'."\r\n"
                    ."\r\n"
                    .'------------------------------'."\r\n"
                    .'■送信情報'."\r\n"
                    .'送信URL：[_url]'."\r\n"
                    .'送信日時：[_date] [_time]'."\r\n"
                    .'IP：[_remote_ip]'."\r\n"
                    .'UA：[_user_agent]'."\n"
                    .'Reply-To: [your_email]'."\n"
                    .'Cc: kaiyaku@free-max.com'."\n"
                    ."\n\n"
                    ."\n"
                    .'1'."\n"
                    .'[FreeMax+5Gカスタマーサポート] 端末の解約依頼を受付いたしました。'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'[your_email]'."\n"
                    .'※このメール自動返信メールです。当メールアドレスへの返信はできません。'."\r\n"
                    .'お問い合わせの際は、『お問い合わせフォーム』よりお願いいたします。'."\r\n"
                    ."\r\n"
                    .'[your_name]様'."\r\n"
                    ."\r\n"
                    .'大変お世話になっております。'."\r\n"
                    .'FreeMax+5Gカスタマーサポートです。'."\r\n"
                    ."\r\n"
                    .'この度は、端末の解約申請を受付けいたしました。'."\r\n"
                    ."\r\n"
                    .'解約日により最終決済日が異なりますので、ご確認くださいますようお願い申し上げます。'."\r\n"
                    .'※お客様のご解約日及び返送先住所につきましては、当社より改めましてメールにてお知らせいたします。'."\r\n"
                    ."\r\n"
                    .'・1～15日までの解約申請　⇒　【当月末解約】'."\r\n"
                    .'※解約の取消をご希望の場合、当月20日までにご連絡いただくようお願いいたします。'."\r\n"
                    ."\r\n"
                    .'・16～31日までの解約申請　⇒　【翌月末解約】'."\r\n"
                    .'※解約の取消をご希望の場合、翌月20日までにご連絡いただくようお願いいたします。'."\r\n"
                    ."\r\n"
                    .'何かご不明な点などがございましたら、お気軽にお問い合わせください。'."\r\n"
                    .'今後とも『FreeMax+5G』をご愛顧いただきますようお願いいたします。'."\r\n"
                    ."\r\n"
                    .'--'."\r\n"
                    .'FreeMax+5G運営事務局'."\r\n"
                    .'営業時間：平日10:00～19:00　土日・祝日定休日'."\n"
                    .'Reply-To: support@free-max.com'."\n"
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
                'KaiyakuForm',
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
                'cancelform',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-16 11:18:11',
            ],
            'post_modified_gmt' => [
                '2022-11-16 02:18:11',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/?post_type=wpcf7_contact_form&#038;p=9',
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
        'timestamp' => 1669277155,
        'site_id' => 1,
        'group' => 'posts',
        'key' => 9,
        'type' => 'object',
        'timeout' => 1670486755,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/