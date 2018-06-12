<?php

namespace App\DataFixtures;

use App\Entity\Account;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AccountFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; ++$i) {
            $account = new Account();
            $account->setUsername('jonsnow_'.$i);
            $account->setIsActive(0 == $i % 2 ? false : true);
            $account->setPassword(md5((new \DateTime())->getTimestamp()));
            $manager->persist($account);
            $this->addReference('account_'.$i, $account);
        }

        $manager->flush();
    }
}
