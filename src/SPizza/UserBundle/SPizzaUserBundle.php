<?php

namespace SPizza\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SPizzaUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
