<?php

// src/Controller/OwnerController.php
namespace App\Controller;

use Symfony\Component\Security\Core\Security;



class OwnerController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function __invoke()
    {
        $user = $this->security->getUser();
        //dd($user);
        return $user;
    }
}
