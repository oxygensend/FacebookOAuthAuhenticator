<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class FacebookController extends AbstractController
{
    public function __construct(readonly  private ClientRegistry $clientRegistry)
    {
    }

    #[Route('/connect/facebook', name: 'connect_facebook')]
    public function connect():  RedirectResponse
    {
        return $this->clientRegistry
            ->getClient('facebook')
            ->redirect([
                'public_profile', 'email'
            ]);
    }

    #[Route('/connect/facebook/check', name: 'connect_facebook_check')]
    public function connectCheck()
    {
        $client = $this->clientRegistry->getClient('facebook');


//       return $this->redirectToRoute('home');

    }
}
