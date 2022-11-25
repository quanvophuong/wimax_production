<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'last_checked' => [
                1669344253,
            ],
            'checked' => [
                [
                    'flatsome-child' => '3.0',
                    'flatsome' => '3.15.7',
                    'twentytwentytwo' => '1.2',
                ],
            ],
            'response' => [
                [
                    'twentytwentytwo' => [
                        'theme' => 'twentytwentytwo',
                        'new_version' => '1.3',
                        'url' => 'https://wordpress.org/themes/twentytwentytwo/',
                        'package' => 'https://downloads.wordpress.org/theme/twentytwentytwo.1.3.zip',
                        'requires' => '5.9',
                        'requires_php' => '5.6',
                    ],
                ],
            ],
            'no_update' => [
                [
                    'flatsome' => [
                        'theme' => 'flatsome',
                        'new_version' => '3.15.7',
                        'url' => 'https://free-max.com/form/wp-admin/admin.php?page=flatsome-version-info&version=3.15.7',
                        'package' => 'https://free-max.com/form/wp-admin/admin.php?page=flatsome-panel&flatsome_version=3.15.7&flatsome_download=1',
                    ],
                ],
            ],
            'translations' => [
                [],
            ],
        ],
    ],
    [
        'timestamp' => 1669344253,
        'site_id' => 1,
        'group' => 'site-transient',
        'key' => 'update_themes',
        'type' => 'object',
        'timeout' => 1671763453,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/