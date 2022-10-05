<?php

namespace Plugin\HsdGreenFormPg;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    /**
     * @return array
     */
    public static function getNav()
    {
        return [
            'hsd_green_form_pg_admin_root_menu' => [
                'name' => 'GreenForm',
                'icon' => 'fa-envira',
                'children' => [
                    'hsd_green_form_pg_admin_root_menu_child' => [
                        'name' => 'GreenForm',
                        'url' => 'hsd_green_form_pg_admin_config',
                    ]
                ]
            ],
        ];
    }
}
