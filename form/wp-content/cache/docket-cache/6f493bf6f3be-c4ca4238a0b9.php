<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'term_id' => [
                '1',
            ],
            'name' => [
                '未分類',
            ],
            'slug' => [
                'uncategorized',
            ],
            'term_group' => [
                '0',
            ],
            'term_taxonomy_id' => [
                '1',
            ],
            'taxonomy' => [
                'category',
            ],
            'description' => [
                '',
            ],
            'parent' => [
                '0',
            ],
            'count' => [
                '0',
            ],
        ],
    ],
    [
        'timestamp' => 1669262558,
        'site_id' => 1,
        'group' => 'terms',
        'key' => 1,
        'type' => 'object',
        'timeout' => 1670472158,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/