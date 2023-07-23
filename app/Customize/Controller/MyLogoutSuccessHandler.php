<?php

declare(strict_types=1);

namespace Customize\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MyLogoutSuccessHandler extends AbstractController implements LogoutSuccessHandlerInterface
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function onLogoutSuccess(Request $request)
    {
        dump($_SERVER['HTTP_HOST']);
        // get domain name
        $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') === FALSE ? 'http' : 'https';
        $domainLink = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';

        dump($protocol, $domainLink);

        return new RedirectResponse($domainLink);
    }
}
