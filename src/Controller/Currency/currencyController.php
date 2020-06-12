<?php

namespace App\Controller\Currency;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @author Mauro Ribeiro
 * @since 2020-06-12
 */
class currencyController extends AbstractController
{
    public function show()
    {
        $currency = $this->getApi();

        return $this->render('currency/currency.html.twig', array(
            'info' => $currency,
            'title_page' => ' - Cotação',
        ));
    }

    protected function getApi ()
    {
        $apiUrl = "https://economia.awesomeapi.com.br/json/all";

        $currency = file_get_contents($apiUrl);
        $currency = json_decode($currency, true);

        return $currency;
    }
}