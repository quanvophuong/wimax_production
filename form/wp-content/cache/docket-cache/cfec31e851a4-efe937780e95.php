<?php 
return array (
  'timestamp' => 1680017587,
  'site_id' => 1,
  'group' => 'post_meta',
  'key' => 351,
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
      0 => '<h3>お客様情報</h3>
<label> ■注文番号</label>
[text* order_id]</label>

<label> ■お名前</label>
[text* myname]</label>

<label> ■メールアドレス</label>
    [email* email] </label>

<h3>クーポンコード</h3>
<label><font size="3"> ■クーポンコード入力欄</font>[text* coupon]</label>

[submit "送信"]
[multistep coupon first_step last_step send_email "https://free-max.com/form/coupon-thanks/"]',
    ),
    '_mail' => 
    array (
      0 => 
      array (
        'active' => true,
        'subject' => '【FreeMax+5G キャッシュバック特典】クーポンコードの入力を受け付けいたしました。',
        'sender' => 'FreeMax+5G <cb@free-max.com>',
        'recipient' => 'FreeMax+5G <cb@free-max.com>',
        'body' => 'お客様情報
■注文番号：[order_id]
■お名前：[myname]
■メールアドレス：[email]

クーポンコード
■クーポンコード入力欄：[coupon]

-- 
このメールは [_site_title] ([_site_url]) のお問い合わせフォームから送信されました',
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
        'subject' => '【FreeMax+5G キャッシュバック特典】クーポンコードの入力を受け付けいたしました。',
        'sender' => 'FreeMax+5G <cb@free-max.com>',
        'recipient' => '[email]',
        'body' => '※このメール自動返信メールです。当メールアドレスへの返信はできません。

[myname]様

お世話になっております。
FreeMax+5Gカスタマーサポートです。

この度は、クーポンコードのご入力いただきましてありがとうございました。

ご入力いただきました内容は下記の通りとなります。

お客様情報
■注文番号：[order_id]
■お名前：[myname]
■メールアドレス：[email]

クーポンコード
■クーポンコード入力欄：[coupon]',
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
        'invalid_required' => 'Please fill out this field.',
        'invalid_too_long' => 'This field has a too long input.',
        'invalid_too_short' => 'This field has a too short input.',
        'invalid_first_step' => 'Please fill out the form on the previous page.',
        'upload_failed' => 'ファイルのアップロード時に不明なエラーが発生しました。',
        'upload_file_type_invalid' => 'この形式のファイルはアップロードできません。',
        'upload_file_too_large' => 'The uploaded file is too large.',
        'upload_failed_php_error' => 'ファイルのアップロード中にエラーが発生しました。',
        'invalid_email' => 'Please enter an email address.',
        'invalid_url' => 'Please enter a URL.',
        'invalid_tel' => 'Please enter a telephone number.',
        'invalid_date' => 'Please enter a date in YYYY-MM-DD format.',
        'date_too_early' => 'This field has a too early date.',
        'date_too_late' => 'This field has a too late date.',
        'invalid_number' => 'Please enter a number.',
        'number_too_small' => 'This field has a too small number.',
        'number_too_large' => 'This field has a too large number.',
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
      ),
    ),
    'gs_settings' => 
    array (
      0 => 
      array (
        'sheet-name' => 'FM-キャッシュバッククーポン',
        'sheet-tab-name' => 'クーポン入力反映',
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
        'coupon' => 'クーポン番号',
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
        5 => 'クーポン番号',
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