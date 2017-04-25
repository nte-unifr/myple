<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ResourceType;

class LoadResourceTypeData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $web = new ResourceType();
        $web->setName('web');
        $manager->persist($web);

        $video = new ResourceType();
        $video->setName('video');
        $manager->persist($video);

        $pdf = new ResourceType();
        $pdf->setName('pdf');
        $manager->persist($pdf);
        
        $manager->flush();
    }
}