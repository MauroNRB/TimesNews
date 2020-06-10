<?php

namespace App\Controller\Games;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\Games\api;

class freeController extends AbstractController
{
    public function show()
    {
        $api = new api();

        $info = $api->info();
        return $this->render('game/free.html.twig', [
            'info' => $info,
        ]);
    }
}