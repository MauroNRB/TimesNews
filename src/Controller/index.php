<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class index extends AbstractController
{
    public function index()
    {
        return $this->render('index.html.twig');
    }
}