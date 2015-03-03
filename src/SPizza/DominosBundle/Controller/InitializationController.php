<?php

namespace SPizza\DominosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Goutte\Client;

class InitializationController extends Controller
{
    public function initializeScrapedData()
    {
        $client = new Client();
        $client->getClient()->setDefaultOption('config/curl/'.CURLOPT_TIMEOUT, 60);

        /* Pizzas Crawler */
        $links = [];

        $crawler = $client->request('GET', 'http://pizza.dominos.fr/la-carte/nos-pizzas');

    }

    public function initializeStaticData()
    {

    }
}
