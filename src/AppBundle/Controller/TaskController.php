<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TaskController extends Controller
{
    /**
     * @Route("/", name="tasks_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Task");
        $tasks = $repository->findAll();

        return $this->render('tasks/index.html.twig', array(
            'tasks' => $tasks
        ));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Task");
        $task = $repository->find($id);
        $tutorials = $this->getDoctrine()->getRepository('AppBundle:Resource')->createQueryBuilder('r')
            ->select('r', 't')
            ->leftJoin('r.tasks', 't')
            ->where('r.tutorial = 1')
            ->andWhere('t.id = :task_id')
            ->setParameter('task_id', $task->getId())
            ->getQuery()->getResult();
        $resources = $this->getDoctrine()->getRepository('AppBundle:Resource')->createQueryBuilder('r')
            ->select('r', 't')
            ->leftJoin('r.tasks', 't')
            ->where('r.tutorial = 0')
            ->andWhere('t.id = :task_id')
            ->setParameter('task_id', $task->getId())
            ->getQuery()->getResult();

        return $this->render('tasks/show.html.twig', array(
            'task' => $task,
            'resources' => $resources,
            'tutorials' => $tutorials
        ));
    }
}