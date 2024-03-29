<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\NavService;

class TaskController extends Controller
{
    /**
     * @Route("/{_locale}/tasks/{id}", name="tasks_show")
     */
    public function showAction($id, Request $request, NavService $navService)
    {
        $locale = strtoupper($request->getLocale());
        $repository = $this->getDoctrine()->getRepository("AppBundle:Task");
        $resourcesRepo = $this->getDoctrine()->getRepository('AppBundle:Resource');
        $toolsRepo = $this->getDoctrine()->getRepository('AppBundle:Tool');
        $familiesRepo = $this->getDoctrine()->getRepository('AppBundle:ToolFamily');
        $formationsRepo = $this->getDoctrine()->getRepository('AppBundle:Formation');

        $task = $repository->find($id);

        // tutorials from the task
        $tTutorials = $resourcesRepo->createQueryBuilder('r')
            ->select('r', 't')
            ->innerJoin('r.tasks', 't')
            ->innerJoin('r.langs', 'l')
            ->where('r.tutorial = 1')
            ->andWhere('t.id = :task_id')
            ->andWhere('l.code = :lang_code')
            ->setParameter('task_id', $id)
            ->setParameter('lang_code', $locale)
            ->getQuery()->getResult();
        // tutorials from the activities related to the task
        $aTutorials = $resourcesRepo->createQueryBuilder('r')
            ->select('r')
            ->innerJoin('r.activities', 'a')
            ->innerJoin('r.langs', 'l')
            ->where('r.tutorial = 1')
            ->andWhere('a.task = :task_id')
            ->andWhere('l.code = :lang_code')
            ->setParameter('task_id', $id)
            ->setParameter('lang_code', $locale)
            ->getQuery()->getResult();
        // merge both
        $tutorials = array_unique(array_merge($tTutorials, $aTutorials), SORT_REGULAR);

        // resources from the task
        $tResources = $resourcesRepo->createQueryBuilder('r')
            ->select('r', 't')
            ->innerJoin('r.tasks', 't')
            ->innerJoin('r.langs', 'l')
            ->where('r.tutorial = 0')
            ->andWhere('t.id = :task_id')
            ->andWhere('l.code = :lang_code')
            ->setParameter('task_id', $id)
            ->setParameter('lang_code', $locale)
            ->getQuery()->getResult();
        // resources from the activities related to the task
        $aResources = $resourcesRepo->createQueryBuilder('r')
            ->select('r')
            ->innerJoin('r.activities', 'a')
            ->innerJoin('r.langs', 'l')
            ->where('r.tutorial = 0')
            ->andWhere('a.task = :task_id')
            ->andWhere('l.code = :lang_code')
            ->setParameter('task_id', $id)
            ->setParameter('lang_code', $locale)
            ->getQuery()->getResult();
        // merge both
        $resources = array_unique(array_merge($tResources, $aResources), SORT_REGULAR);

        $tools = $toolsRepo->createQueryBuilder('t')
            ->select('t')
            ->innerJoin('t.activities', 'a')
            ->where('a.task = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();

        $families = $familiesRepo->findAll();

        $formations = $formationsRepo->createQueryBuilder('f')
            ->select('f')
            ->innerJoin('f.activities', 'a')
            ->where('a.task = :task_id')
            ->setParameter('task_id', $id)
            ->getQuery()->getResult();

        return $this->render('tasks/show.html.twig', array(
            'task' => $task,
            'resources' => $resources,
            'tutorials' => $tutorials,
            'tools' => $tools,
            'families' => $families,
            'formations' => $formations,
            'navTasks' => $navService->getTasks()
        ));
    }
}