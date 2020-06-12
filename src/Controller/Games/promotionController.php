<?php

namespace App\Controller\Games;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @author Mauro Ribeiro
 * @since 2020-06-10
 */
class promotionController extends AbstractController
{
    public function show()
    {
        $api = new api();

        $info = $api->getInfo();
        return $this->render('game/games.html.twig', array(
            'info' => $info,
            'title_page' => ' - Promoção dos Games',
            'types' => array(
                'deals_aggregator'
            ),
        ));
    }
}