<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @author Mauro Ribeiro
 * @since 2020-06-09
 */
class indexController extends AbstractController
{
    public function show()
    {
        return $this->render('index.html.twig');
    }
}