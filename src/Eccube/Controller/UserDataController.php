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

namespace Eccube\Controller;

use Eccube\Entity\Page;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Repository\Master\DeviceTypeRepository;
use Eccube\Repository\PageRepository;
use Eccube\Repository\CalendarRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserDataController extends AbstractController
{
    /**
     * @var PageRepository
     */
    protected $pageRepository;

    /**
     * @var DeviceTypeRepository
     */
    protected $deviceTypeRepository;

    protected $calendarRepository;

    /**
     * UserDataController constructor.
     *
     * @param PageRepository $pageRepository
     * @param DeviceTypeRepository $deviceTypeRepository
     */
    public function __construct(
        PageRepository $pageRepository,
        DeviceTypeRepository $deviceTypeRepository,
        CalendarRepository $calendarRepository
    ) {
        $this->pageRepository = $pageRepository;
        $this->deviceTypeRepository = $deviceTypeRepository;
        $this->calendarRepository = $calendarRepository;
    }

    /**
     * @Route("/%eccube_user_data_route%/{route}", name="user_data", requirements={"route": "([0-9a-zA-Z_\-]+\/?)+(?<!\/)"}, methods={"GET"})
     */
    public function index(Request $request, $route)
    {
        $Page = $this->pageRepository->findOneBy(
            [
                'url' => $route,
                'edit_type' => Page::EDIT_TYPE_USER,
            ]
        );

        if (null === $Page) {
            throw new NotFoundHttpException();
        }

        $file = sprintf('@user_data/%s.twig', $Page->getFileName());

        $event = new EventArgs(
            [
                'Page' => $Page,
                'file' => $file,
            ],
            $request
        );
        $this->eventDispatcher->dispatch(EccubeEvents::FRONT_USER_DATA_INDEX_INITIALIZE, $event);
        if($route == 'shop'){
            $next_month = new \DateTime('now');
            date_add($next_month, new \DateInterval('P1M'));
            $next_month_day = $next_month->format('Y-m-01');
            $next_date = new \DateTime($next_month_day);

            $current_month = new \DateTime('now');
            if($current_month->format('H') > 13) date_add($current_month, new \DateInterval('P1D'));
            $current_month_day = $current_month->format('Y-m-d');
            $current_date = new \DateTime($current_month_day);
            $currnet_conf_date = $this->getAvailableDate($current_date);
            $next_conf_date = $this->getAvailableDate($next_date);

            $currnet_last_date = clone $currnet_conf_date;

            date_add($currnet_last_date, new \DateInterval('P1D'));
            $is_use_current = date('n') == $currnet_last_date->format('n');
            // $is_use_current = true;
            // while(1){
            //     $weeknum = $next_date->format('N');
            //     if ($weeknum < 6){
            //         $Calendar = $this->calendarRepository->findOneBy(array('holiday' => $next_date));
            //         if (empty($Calendar)){
            //             break;
            //         }
            //     }
            //     date_add($next_date, new \DateInterval('P1D'));
            // }

            $next_date_string = $next_conf_date->format('n月j日発送予定');
            $current_date_string = $currnet_conf_date->format('n月j日発送予定');
            return $this->render($file, array(
                'next_delivery_date' => $next_date_string,
                'current_delivery_date' => $current_date_string,
                'is_use_current_month' => $is_use_current,
            ));
        }
        return $this->render($file);
    }

    function getAvailableDate($date){
        while(1){
            $weeknum = $date->format('N');
            if ($weeknum < 6){
                $Calendar = $this->calendarRepository->findOneBy(array('holiday' => $date));
                $date->setTimezone(new \DateTimeZone('Asia/Tokyo'));
                if (empty($Calendar)){
                    return $date;
                    break;
                }
            }
            date_add($date, new \DateInterval('P1D'));
        }

    }
}
