<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'version_checked' => [
                '6.0.3',
            ],
            'last_checked' => [
                1669140508,
            ],
        ],
    ],
    [
        'timestamp' => 1669108108,
        'site_id' => 1,
        'group' => 'transient',
        'key' => 'update_wpcf7r_extensions',
        'type' => 'object',
        'timeout' => 1670144908,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/