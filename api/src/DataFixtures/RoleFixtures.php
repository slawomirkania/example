<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $roleSuperAdmin = new Role();
        $roleSuperAdmin->setSymbol('ROLE_SUPER_ADMIN');
        $roleSuperAdmin->setDescription('You can do whatever you want');
        $roleSuperAdmin->addAccount($this->getReference('account_1'));

        $roleAdmin = new Role();
        $roleAdmin->setSymbol('ROLE_ADMIN');
        $roleAdmin->setDescription('You can manage users');
        $roleAdmin->addAccount($this->getReference('account_2'));

        $roleUser = new Role();
        $roleUser->setSymbol('ROLE_USER');
        $roleUser->setDescription('Just work');
        $roleUser->addAccount($this->getReference('account_3'));
        $roleUser->addAccount($this->getReference('account_4'));

        $manager->persist($roleSuperAdmin);
        $manager->persist($roleAdmin);
        $manager->persist($roleUser);

        $manager->flush();
    }
}
