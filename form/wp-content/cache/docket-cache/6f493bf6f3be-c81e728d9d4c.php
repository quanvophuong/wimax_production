<?php if ( !\defined('ABSPATH') ) { return false; }
return \Nawawi\DocketCache\Exporter\Hydrator::hydrate(
    $o = [
        clone (\Nawawi\DocketCache\Exporter\Registry::$prototypes['stdClass'] ?? \Nawawi\DocketCache\Exporter\Registry::p('stdClass')),
    ],
    null,
    [
        'stdClass' => [
            'term_id' => [
                2,
            ],
            'name' => [
                'Nested Pages',
            ],
            'slug' => [
                'nested-pages',
            ],
            'term_group' => [
                0,
            ],
            'term_taxonomy_id' => [
                2,
            ],
            'taxonomy' => [
                'nav_menu',
            ],
            'description' => [
                '',
            ],
            'parent' => [
                0,
            ],
            'count' => [
                0,
            ],
            'filter' => [
                'raw',
            ],
        ],
    ],
    [
        'timestamp' => 1669262562,
        'site_id' => 1,
        'group' => 'terms',
        'key' => 2,
        'type' => 'object',
        'timeout' => 1670472162,
        'data' => $o[0],
    ],
    []
);
/*@DOCKET_CACHE_EOF*/