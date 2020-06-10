<?php

namespace App\Controller\Games;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class promotionController extends AbstractController
{
    public function show()
    {
        return $this->render('index.html.twig');
    }
}