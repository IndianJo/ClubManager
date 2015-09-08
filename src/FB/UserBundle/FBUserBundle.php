<?php

namespace FB\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FBUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
