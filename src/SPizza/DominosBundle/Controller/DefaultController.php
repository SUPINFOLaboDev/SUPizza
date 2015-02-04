<?php

namespace SPizza\DominosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SPizzaDominosBundle:Default:index.html.twig', array('name' => $name));
    }
}
