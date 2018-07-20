<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Collections\ArrayCollection;

class TaskController extends Controller
{
    /**
     * @Route("/{_locale}", name="tasks_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Task");
        $tasks = $repository->findBy(array('published' => true));

        return $this->render('tasks/index.html.twig', array(
            'tasks' => $tasks
        ));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Task");
        $resourcesRepo = $this->getDoctrine()->getRepository('AppBundle:Resource');
        $task = $repository->find($id);

        // tutorials from the task
        $tTutorials = $resourcesRepo->createQueryBuilder('r')
            ->select('r', 't')
            ->innerJoin('r.tasks', 't')
            ->where('r.tutorial = 1')
            ->andWhere('t.id = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();
        // tutorials from the activities related to the task
        $aTutorials = $resourcesRepo->createQueryBuilder('r')
            ->select('r')
            ->innerJoin('r.activities', 'a')
            ->where('r.tutorial = 1')
            ->andWhere('a.task = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();
        // merge both
        $tutorials = array_unique(array_merge($tTutorials, $aTutorials), SORT_REGULAR);

        // resources from the task
        $tResources = $resourcesRepo->createQueryBuilder('r')
            ->select('r', 't')
            ->innerJoin('r.tasks', 't')
            ->where('r.tutorial = 0')
            ->andWhere('t.id = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();
        // resources from the activities related to the task
        $aResources = $resourcesRepo->createQueryBuilder('r')
            ->select('r')
            ->innerJoin('r.activities', 'a')
            ->where('r.tutorial = 0')
            ->andWhere('a.task = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();
        // merge both
        $resources = array_unique(array_merge($tResources, $aResources), SORT_REGULAR);

        $tools = $this->getDoctrine()->getRepository('AppBundle:Tool')->createQueryBuilder('t')
            ->select('t')
            ->innerJoin('t.activities', 'a')
            ->where('a.task = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();

        return $this->render('tasks/show.html.twig', array(
            'task' => $task,
            'resources' => $resources,
            'tutorials' => $tutorials,
            'tools' => $tools
        ));
    }
}