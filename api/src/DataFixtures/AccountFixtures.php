<?php

namespace App\DataFixtures;

use App\Entity\Account;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccountFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $firstAccount = new Account();
        $firstAccount->setUsername('jonsnow');
        $manager->persist($firstAccount);

        $manager->flush();
    }
}
