<?php if ( !\defined('ABSPATH') ) { return false; }
return [
    'timestamp' => 1669344257,
    'site_id' => 1,
    'group' => 'options',
    'key' => 'cron',
    'type' => 'array',
    'timeout' => 1670553857,
    'data' => [
        1669344256 => [
            'wordfence_completeCoreUpdateNotification' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => false,
                    'args' => [],
                ],
            ],
            'wf_scan_monitor' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'wf_scan_monitor_interval',
                    'args' => [],
                    'interval' => 60,
                ],
            ],
        ],
        1669344341 => [
            'docketcache_gc' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'docketcache_gc_schedule',
                    'args' => [],
                    'interval' => 300,
                ],
            ],
        ],
        1669344399 => [
            'wp_privacy_delete_old_export_files' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'hourly',
                    'args' => [],
                    'interval' => 3600,
                ],
            ],
        ],
        1669346141 => [
            'docketcache_watchproc' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'hourly',
                    'args' => [],
                    'interval' => 3600,
                ],
            ],
        ],
        1669346147 => [
            'wordfence_ls_ntp_cron' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'hourly',
                    'args' => [],
                    'interval' => 3600,
                ],
            ],
        ],
        1669346153 => [
            'wordfence_hourly_cron' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'hourly',
                    'args' => [],
                    'interval' => 3600,
                ],
            ],
        ],
        1669350016 => [
            'rsssl_every_day_hook' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'rsssl_daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        1669358799 => [
            'wp_https_detection' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'twicedaily',
                    'args' => [],
                    'interval' => 43200,
                ],
            ],
            'wp_version_check' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'twicedaily',
                    'args' => [],
                    'interval' => 43200,
                ],
            ],
            'wp_update_plugins' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'twicedaily',
                    'args' => [],
                    'interval' => 43200,
                ],
            ],
            'wp_update_themes' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'twicedaily',
                    'args' => [],
                    'interval' => 43200,
                ],
            ],
        ],
        1669358805 => [
            'wp_update_user_counts' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'twicedaily',
                    'args' => [],
                    'interval' => 43200,
                ],
            ],
        ],
        1669401999 => [
            'recovery_mode_clean_expired_keys' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        1669402005 => [
            'wp_scheduled_delete' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
            'delete_expired_transients' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        [
            'wp_scheduled_auto_draft_delete' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        1669425344 => [
            'ai1wm_storage_cleanup' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        1669425353 => [
            'wordfence_daily_cron' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        1669429462 => [
            'fluentmail_do_daily_scheduled_tasks' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'daily',
                    'args' => [],
                    'interval' => 86400,
                ],
            ],
        ],
        1669516800 => [
            'wordfence_start_scheduled_scan' => [
                'a7d22fa257574394c503827635e82bff' => [
                    'schedule' => false,
                    'args' => [
                        1669516800,
                    ],
                ],
            ],
        ],
        1669618800 => [
            'wordfence_email_activity_report' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => false,
                    'args' => [],
                ],
            ],
        ],
        1669661199 => [
            'wp_site_health_scheduled_check' => [
                '40cd750bba9870f18aada2478b24840a' => [
                    'schedule' => 'weekly',
                    'args' => [],
                    'interval' => 604800,
                ],
            ],
        ],
        1669776000 => [
            'wordfence_start_scheduled_scan' => [
                '88fbd18c34654a00a444a2b51f585cb1' => [
                    'schedule' => false,
                    'args' => [
                        1669776000,
                    ],
                ],
            ],
        ],
        'version' => 2,
    ],
];
/*@DOCKET_CACHE_EOF*/