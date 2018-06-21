<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\ProductGroup;
use AppBundle\Entity\ProductionUnit;
use AppBundle\Entity\TimeUnit;
use AppBundle\Helper\Str;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $productGroup = new ProductGroup();
        $productGroup->setName(Str::generateRandomString(5));
        $manager->persist($productGroup);

        $productionUnit = new ProductionUnit();
        $productionUnit->setName(Str::generateRandomString(5));
        $manager->persist($productionUnit);

        $timeUnit = new TimeUnit();
        $timeUnit->setName(Str::generateRandomString(5));
        $manager->persist($timeUnit);

        $manager->flush();
    }
}