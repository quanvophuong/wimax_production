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

namespace Customize\Security\Http\Authentication;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler;

class EccubeAuthenticationSuccessHandler extends DefaultAuthenticationSuccessHandler
{
    /**
     * {@inheritdoc}
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        try {
            $response = parent::onAuthenticationSuccess($request, $token);
        } catch (RouteNotFoundException $e) {
            throw new BadRequestHttpException($e->getMessage(), $e, $e->getCode());
        }
        // get domain name
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
        $domainLink = $protocol . '://' . $_SERVER['HTTP_HOST'];

        // define url for check
        $baseUrlChecks =  [
            'https://free-max.com/',
            'https://free-max.com/shop/',
            $domainLink . '/shop/',
            $domainLink . '/',
            $domainLink . '/shop/mypage/login/',
        ];

        if (preg_match('/^https?:\\\\/i', $response->getTargetUrl()) || in_array($response->getTargetUrl(), $baseUrlChecks)) {
            $response->setTargetUrl($request->getUriForPath('/mypage/'));
        }

        return $response;
    }
}
