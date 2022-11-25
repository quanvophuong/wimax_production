<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (($p = &\Nawawi\DocketCache\Exporter\Registry::$prototypes)['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
        clone $p['stdClass'],
    ],
    null,
    [
        'stdClass' => [
            'year' => [
                '2022',
                '2022',
            ],
            'month' => [
                '11',
                '10',
            ],
        ],
    ],
    [
        'timestamp' => 1669109446,
        'site_id' => 1,
        'group' => 'docketcache-post-media',
        'key' => 'media_library_months_with_files',
        'type' => 'array',
        'timeout' => 1671701446,
        'data' => [
            $o[0],
            $o[1],
        ],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/