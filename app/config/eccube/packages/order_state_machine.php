<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Eccube\Entity\Master\OrderStatus as Status;
use Eccube\Service\OrderStateMachineContext;

$container->loadFromExtension('framework', [
    'workflows' => [
        'order' => [
            'type' => 'state_machine',
            'marking_store' => [
                'type' => 'single_state',
                'arguments' => 'status',
            ],
            'supports' => [
                OrderStateMachineContext::class,
            ],
            'initial_place' => (string) Status::NEW,
            'places' => [
                (string) Status::NEW,
                (string) Status::IN_PROGRESS,
                (string) Status::PICKUP,
                (string) Status::PAID,
                (string) Status::CANCEL,
                (string) Status::DELIVERED,
                (string) Status::PROCESSING,
                (string) Status::PENDING,
                (string) Status::RETURNED,

            ],
            'transitions' => [
                'new' => [
                    'from' => [
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::NEW,
                ],
                'in_progress' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::IN_PROGRESS,
                ],
                'pick_up' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::PICKUP,
                ],
                'pay' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::PAID,
                ],

                'cancel' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::CANCEL,
                ],
                'delivered' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::DELIVERED,
                ],
                'processing' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PENDING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::PROCESSING,
                ],
                'pending' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::RETURNED,

                    ],
                    'to' => (string) Status::PENDING,
                ],
                'return' => [
                    'from' => [
                        (string) Status::NEW,
                        (string) Status::IN_PROGRESS,
                        (string) Status::PICKUP,
                        (string) Status::PAID,
                        (string) Status::CANCEL,
                        (string) Status::DELIVERED,
                        (string) Status::PROCESSING,
                        (string) Status::PENDING,

                    ],
                    'to' => (string) Status::RETURNED,
                ],
//                'subscription' => [
//                    'from' => [
//                        (string) Status::NEW,
//                        (string) Status::IN_PROGRESS,
//                        (string) Status::PICKUP,
//                        (string) Status::PAID,
//                        (string) Status::CANCEL,
//                        (string) Status::DELIVERED,
//                        (string) Status::PROCESSING,
//                        (string) Status::PENDING,
//                        (string) Status::RETURNED,
//                    ],
//                    'to' => (string) Status::SUBSCRIPTION,
//                ],
                // 'packing' => [
                //     'from' => [(string) Status::NEW, (string) Status::PAID],
                //     'to' => (string) Status::IN_PROGRESS,
                // ],
                // 'back_to_in_progress' => [
                //     'from' => [(string) Status::CANCEL,(string) Status::NEW],
                //     'to' => (string) Status::IN_PROGRESS,
                // ],
                // 'ship' => [
                //     'from' => [(string) Status::NEW, (string) Status::PAID, (string) Status::IN_PROGRESS],
                //     'to' => [(string) Status::DELIVERED],
                // ],
                // 'return' => [
                //     'from' => (string) Status::DELIVERED,
                //     'to' => (string) Status::RETURNED,
                // ],
                // 'cancel_return' => [
                //     'from' => (string) Status::RETURNED,
                //     'to' => (string) Status::DELIVERED,
                // ],
            ],
        ],
    ],
]);
