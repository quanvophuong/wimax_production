<?php if ( !\defined('ABSPATH') ) { return false; }
return [
    'timestamp' => 1669277155,
    'site_id' => 1,
    'group' => 'post_meta',
    'key' => 9,
    'type' => 'array',
    'timeout' => 1670486755,
    'data' => [
        '_form' => [
            '<label>IMEI <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span><span style="font-size:smaller;">端末裏面記載の15桁の数字</span>'."\n"
                .'    [text* imei] </label>'."\n"
                ."\n"
                .'<label> お名前 <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\n"
                .'    [text* your_name] </label>'."\n"
                ."\n"
                .'<label> メールアドレス <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\n"
                .'    [email* your_email] </label>'."\n"
                ."\n"
                .'<label> 電話番号 <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\n"
                .'    [tel* your_tel] </label>'."\n"
                ."\n"
                .'<label> 注文番号 '."\n"
                .'    [text order_id] </label>'."\n"
                ."\n"
                .'<label> 解約の理由<span style="font-size: 80%;">（複数選択可）</span><span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span></label>'."\n"
                .'   [checkbox* cancel_reason use_label_element "Wifiを使う必要がなくなった" "エリア範囲外だった" "速度が遅かった" "他社への乗り換え" "料金に不満" "サポートの対応が悪かった"]'."\n"
                ."\n"
                .'<label> 今後のサービス向上のために悪かった点を教えてください'."\n"
                .'    [textarea cancel_fb_message] </label>'."\n"
                ."\n"
                .'<label> その他ご意見・ご感想を教えてください'."\n"
                .'    [textarea cancel_other_message] </label>'."\n"
                ."\n"
                .'[submit "送信する"]',
        ],
        '_mail' => [
            [
                'active' => true,
                'subject' => '端末の解約:[imei]:[your_name]',
                'sender' => 'FreeMax+5G <kaiyaku@free-max.com>',
                'recipient' => 'FreeMax+5G <kaiyaku@free-max.com>',
                'body' => 'IMEI：[imei]'."\n"
                    .'差出人: [your_name] '."\n"
                    .'注文番号：[order_id]'."\n"
                    .'メールアドレス：[your_email]'."\n"
                    .'電話番号：[your_tel]'."\n"
                    .'解約の理由：[cancel_reason]'."\n"
                    .'今後のサービス向上のために悪かった点を教えてください:'."\n"
                    .'[cancel_fb_message]'."\n"
                    .'その他ご意見・ご感想を教えてください：'."\n"
                    .'[cancel_other_message]'."\n"
                    ."\n"
                    .'------------------------------'."\n"
                    .'■送信情報'."\n"
                    .'送信URL：[_url]'."\n"
                    .'送信日時：[_date] [_time]'."\n"
                    .'IP：[_remote_ip]'."\n"
                    .'UA：[_user_agent]',
                'additional_headers' => 'Reply-To: [your_email]'."\n"
                    .'Cc: kaiyaku@free-max.com',
                'attachments' => '',
                'use_html' => false,
                'exclude_blank' => false,
            ],
        ],
        '_mail_2' => [
            [
                'active' => true,
                'subject' => '[FreeMax+5Gカスタマーサポート] 端末の解約依頼を受付いたしました。',
                'sender' => 'FreeMax+5G <support@free-max.com>',
                'recipient' => '[your_email]',
                'body' => '※このメール自動返信メールです。当メールアドレスへの返信はできません。'."\n"
                    .'お問い合わせの際は、『お問い合わせフォーム』よりお願いいたします。'."\n"
                    ."\n"
                    .'[your_name]様'."\n"
                    ."\n"
                    .'大変お世話になっております。'."\n"
                    .'FreeMax+5Gカスタマーサポートです。'."\n"
                    ."\n"
                    .'この度は、端末の解約申請を受付けいたしました。'."\n"
                    ."\n"
                    .'解約日により最終決済日が異なりますので、ご確認くださいますようお願い申し上げます。'."\n"
                    .'※お客様のご解約日及び返送先住所につきましては、当社より改めましてメールにてお知らせいたします。'."\n"
                    ."\n"
                    .'・1～15日までの解約申請　⇒　【当月末解約】'."\n"
                    .'※解約の取消をご希望の場合、当月20日までにご連絡いただくようお願いいたします。'."\n"
                    ."\n"
                    .'・16～31日までの解約申請　⇒　【翌月末解約】'."\n"
                    .'※解約の取消をご希望の場合、翌月20日までにご連絡いただくようお願いいたします。'."\n"
                    ."\n"
                    .'何かご不明な点などがございましたら、お気軽にお問い合わせください。'."\n"
                    .'今後とも『FreeMax+5G』をご愛顧いただきますようお願いいたします。'."\n"
                    ."\n"
                    .'--'."\n"
                    .'FreeMax+5G運営事務局'."\n"
                    .'営業時間：平日10:00～19:00　土日・祝日定休日',
                'additional_headers' => 'Reply-To: support@free-max.com',
                'attachments' => '',
                'use_html' => false,
                'exclude_blank' => false,
            ],
        ],
        '_messages' => [
            [
                'mail_sent_ok' => 'ありがとうございます。メッセージは送信されました。',
                'mail_sent_ng' => 'メッセージの送信に失敗しました。後でまたお試しください。',
                'validation_error' => '入力内容に問題があります。確認して再度お試しください。',
                'spam' => 'メッセージの送信に失敗しました。後でまたお試しください。',
                'accept_terms' => 'メッセージを送信する前に承諾確認が必要です。',
                'invalid_required' => '必須項目に入力してください。',
                'invalid_too_long' => '入力されたテキストが長すぎます。',
                'invalid_too_short' => '入力されたテキストが短すぎます。',
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
            ],
        ],
        '_additional_settings' => [
            '',
        ],
        '_locale' => [
            'ja',
        ],
        'wpcf7cf_options' => [
            [],
        ],
        '_kintone_setting_data' => [
            [
                'domain' => '',
                'email_address_to_send_kintone_registration_error' => 'yumiji3156@linqru.jp',
                'kintone_basic_authentication_id' => '',
                'kintone_basic_authentication_password' => '',
                'kintone_guest_space_id' => '',
                'app_datas' => [],
            ],
        ],
    ],
];
/*@DOCKET_CACHE_EOF*/