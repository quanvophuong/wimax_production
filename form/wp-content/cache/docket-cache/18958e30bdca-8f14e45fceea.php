<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'ID' => [
                7,
            ],
            'post_author' => [
                '3',
            ],
            'post_date' => [
                '2022-10-24 10:15:18',
            ],
            'post_date_gmt' => [
                '2022-10-24 01:15:18',
            ],
            'post_content' => [
                'yumiji3156@linqru.jp'."\n"
                    ."\n\n"
                    ."\n"
                    .'<label> 会社・組織名'."\r\n"
                    .'    [text your-organizer] </label>'."\r\n"
                    ."\r\n"
                    .'<label> お名前 <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\r\n"
                    .'    [text* your-name] </label>'."\r\n"
                    ."\r\n"
                    .'<label> メールアドレス <span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span>'."\r\n"
                    .'    [email* your-email] </label>'."\r\n"
                    ."\r\n"
                    .'<label> 電話番号<span style="font-size:smaller; color: #fff; border: solid 1px #ff0000; background-color: #FF0000; border-radius: 4px;">必須</span></label>'."\r\n"
                    .'[tel* your_tel] </label>'."\r\n"
                    ."\r\n"
                    .'<label>お問い合わせ内容</label>'."\r\n"
                    .'[textarea your-message] </label>'."\r\n"
                    ."\r\n"
                    .'[submit "送信"]'."\n"
                    .'1'."\n"
                    .'お問い合わせを受け付けいたしました。'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'FreeMax+5G '."\r\n"
                    ."\r\n"
                    .'組織名：[your-organizer]'."\r\n"
                    .'お名前：[your-name]'."\r\n"
                    .'------------------------------'."\r\n"
                    .'電話番号：[your-tel]'."\r\n"
                    .'アドレス：[your-email]'."\r\n"
                    .'------------------------------'."\r\n"
                    .'問合せ詳細：[your-message]'."\r\n"
                    ."\r\n"
                    .'------------------------------'."\r\n"
                    .'■送信情報'."\r\n"
                    .'送信URL：[_url]'."\r\n"
                    .'送信日時：[_date] [_time]'."\r\n"
                    .'IP：[_remote_ip]'."\r\n"
                    ."\r\n"
                    .'-- '."\r\n"
                    .'このメールは [_site_title] ([_site_url]) のお問い合わせフォームから送信されました'."\n"
                    .'Reply-To: [your-email]'."\n"
                    .'Cc: support@free-max.com'."\n"
                    ."\n\n"
                    ."\n"
                    .'1'."\n"
                    .'お問い合わせを受け付けいたしました。'."\n"
                    .'FreeMax+5G <support@free-max.com>'."\n"
                    .'[your-email]'."\n"
                    .'※このメール自動返信メールです。当メールアドレスへの返信はできません。'."\r\n"
                    ."\r\n"
                    .'[your-name]様'."\r\n"
                    ."\r\n"
                    .'お問い合わせいただきありがとうございます。'."\r\n"
                    .'FreeMax+5Gカスタマーサポートです。'."\r\n"
                    ."\r\n"
                    .'お問い合わせ内容を確認させていただき、再度ご連絡いたします。'."\r\n"
                    .'なお、お問い合わせ内容によっては回答にお時間をいただく場合や、回答できかねる場合がございますので予めご了承ください。'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'メッセージ本文:'."\r\n"
                    .'[your-message]'."\r\n"
                    ."\r\n"
                    ."\r\n"
                    .'-- '."\r\n"
                    .'このメールは [_site_title] ([_site_url]) のお問い合わせフォームから送信されました'."\n"
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
                'ContactForm',
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
                '%e3%82%b3%e3%83%b3%e3%82%bf%e3%82%af%e3%83%88%e3%83%95%e3%82%a9%e3%83%bc%e3%83%a0-1',
            ],
            'to_ping' => [
                '',
            ],
            'pinged' => [
                '',
            ],
            'post_modified' => [
                '2022-11-11 15:21:36',
            ],
            'post_modified_gmt' => [
                '2022-11-11 06:21:36',
            ],
            'post_content_filtered' => [
                '',
            ],
            'post_parent' => [
                0,
            ],
            'guid' => [
                'https://free-max.com/form/?post_type=wpcf7_contact_form&#038;p=7',
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
        'key' => 7,
        'type' => 'object',
        'timeout' => 1670472112,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/