<?php
namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class NavService {

  private $em;
  public function __construct(\Doctrine\ORM\EntityManagerInterface $em)  {
    $this->em = $em;
  }

  public function getTasks() {
    $repository = $this->em->getRepository("AppBundle:Task");
    $navTasks = $repository->findBy(array('published' => true));
    return $navTasks;
  }
}