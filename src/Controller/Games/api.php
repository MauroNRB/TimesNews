<?php

namespace App\Controller\Games;

class api
{
    public function info()
    {
        $apiUrl = "https://gx.opera-api.com/api/v1/games?country=br&language=pt";

        $operaGX = file_get_contents($apiUrl);
        $operaGX = json_decode($operaGX, true);
        $operaGX = $operaGX['sections'];

        return $operaGX;
    }
}