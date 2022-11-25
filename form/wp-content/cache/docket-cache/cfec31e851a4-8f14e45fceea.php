<?php if ( !\defined('ABSPATH') ) { return false; }
return [
    'timestamp' => 1669262512,
    'site_id' => 1,
    'group' => 'post_meta',
    'key' => 7,
    'type' => 'array',
    'timeout' => 1670472112,
    'data' => [
        '_form' => [
            '<label> 会社・組織名'."\n"
                .'    [text your-organizer] </label>'."\n"
                ."\n"
                .'<label> お名前 <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\n"
                .'    [text* your-name] </label>'."\n"
                ."\n"
                .'<label> メールアドレス <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\n"
                .'    [email* your-email] </label>'."\n"
                ."\n"
                .'<label> 電話番号<span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span></label>'."\n"
                .'[tel* your_tel] </label>'."\n"
                ."\n"
                .'<label>お問い合わせ内容</label>'."\n"
                .'[textarea your-message] </label>'."\n"
                ."\n"
                .'[submit "送信"]',
        ],
        '_mail' => [
            [
                'active' => true,
                'subject' => 'お問い合わせを受け付けいたしました。',
                'sender' => 'FreeMax+5G <support@free-max.com>',
                'recipient' => 'FreeMax+5G <support@free-max.com>',
                'body' => 'FreeMax+5G '."\n"
                    ."\n"
                    .'組織名：[your-organizer]'."\n"
                    .'お名前：[your-name]'."\n"
                    .'------------------------------'."\n"
                    .'電話番号：[your-tel]'."\n"
                    .'アドレス：[your-email]'."\n"
                    .'------------------------------'."\n"
                    .'問合せ詳細：[your-message]'."\n"
                    ."\n"
                    .'------------------------------'."\n"
                    .'■送信情報'."\n"
                    .'送信URL：[_url]'."\n"
                    .'送信日時：[_date] [_time]'."\n"
                    .'IP：[_remote_ip]'."\n"
                    ."\n"
                    .'-- '."\n"
                    .'このメールは [_site_title] ([_site_url]) のお問い合わせフォームから送信されました',
                'additional_headers' => 'Reply-To: [your-email]'."\n"
                    .'Cc: support@free-max.com',
                'attachments' => '',
                'use_html' => false,
                'exclude_blank' => false,
            ],
        ],
        '_mail_2' => [
            [
                'active' => true,
                'subject' => 'お問い合わせを受け付けいたしました。',
                'sender' => 'FreeMax+5G <support@free-max.com>',
                'recipient' => '[your-email]',
                'body' => '※このメール自動返信メールです。当メールアドレスへの返信はできません。'."\n"
                    ."\n"
                    .'[your-name]様'."\n"
                    ."\n"
                    .'お問い合わせいただきありがとうございます。'."\n"
                    .'FreeMax+5Gカスタマーサポートです。'."\n"
                    ."\n"
                    .'お問い合わせ内容を確認させていただき、再度ご連絡いたします。'."\n"
                    .'なお、お問い合わせ内容によっては回答にお時間をいただく場合や、回答できかねる場合がございますので予めご了承ください。'."\n"
                    ."\n\n"
                    .'メッセージ本文:'."\n"
                    .'[your-message]'."\n"
                    ."\n\n"
                    .'-- '."\n"
                    .'このメールは [_site_title] ([_site_url]) のお問い合わせフォームから送信されました',
                'additional_headers' => 'Reply-To: [_site_admin_email]',
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
        'migrate_from_cf7_redirect' => [
            '1',
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