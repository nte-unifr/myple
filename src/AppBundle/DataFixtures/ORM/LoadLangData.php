<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Lang;

class LoadLangData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $entity = new Lang();
        $entity->setName('Français');
        $entity->setCode('FR');
        $manager->persist($entity);

        $entity = new Lang();
        $entity->setName('Anglais');
        $entity->setCode('EN');
        $manager->persist($entity);
        
        $entity = new Lang();
        $entity->setName('Italien');
        $entity->setCode('IT');
        $manager->persist($entity);

        $entity = new Lang();
        $entity->setName('Allemand');
        $entity->setCode('DE');
        $manager->persist($entity);
        
        $manager->flush();
    }
}