<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\User;
use Authorization\IdentityInterface;

class UserPolicy
{
    public function canEdit(IdentityInterface $identity, User $user): bool
    {
        return $this->isSelf($identity, $user);
    }

    public function canDelete(IdentityInterface $identity, User $user): bool
    {
        return $this->isSelf($identity, $user);
    }

    public function canView(IdentityInterface $identity, User $user): bool
    {
        return $this->isSelf($identity, $user);
    }

    protected function isSelf(IdentityInterface $identity, User $user): bool
    {
        return $identity->getIdentifier() === $user->id;
    }
}
