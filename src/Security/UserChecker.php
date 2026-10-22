<?php

namespace Umbrella\AdminBundle\Security;

use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Umbrella\AdminBundle\Entity\BaseAdminUser;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;


class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof BaseAdminUser) {
            return;
        }

        if (!$user->active) {
            throw new CustomUserMessageAccountStatusException('Account is disabled.');
        }
    }

    public function checkPostAuth(UserInterface $user, ?TokenInterface $token = null): void
    {
    }
}
