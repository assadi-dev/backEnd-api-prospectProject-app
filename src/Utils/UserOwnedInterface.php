<?php

namespace App\Utils;

use App\Entity\User;

interface UserOwnedInterface
{

    public function getUserId(): ?User;


    public function setUserId(?User $user_id): self;
}
