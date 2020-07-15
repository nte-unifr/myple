<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\NavService;

class ActivityController extends Controller
{
    /**
     * @Route("/{_locale}/activities/{id}", requirements={"id" = "\d+"}, name="activities_show")
     */
    public function showAction($id, Request $request, NavService $navService)
    {
        $locale = strtoupper($request->getLocale());
        $repository = $this->getDoctrine()->getRepository("AppBundle:Activity");
        $activity = $repository->find($id);
        $tutorials = $this->getDoctrine()->getRepository('AppBundle:Resource')->createQueryBuilder('r')
            ->select('r', 'a')
            ->leftJoin('r.activities', 'a')
            ->leftJoin('r.langs', 'l')
            ->where('r.tutorial = 1')
            ->andWhere('a.id = :activity_id')
            ->andWhere('l.code = :lang_code')
            ->setParameter('activity_id', $activity->getId())
            ->setParameter('lang_code', $locale)
            ->getQuery()->getResult();
        $resources = $this->getDoctrine()->getRepository('AppBundle:Resource')->createQueryBuilder('r')
            ->select('r', 'a')
            ->leftJoin('r.activities', 'a')
            ->leftJoin('r.langs', 'l')
            ->where('r.tutorial = 0')
            ->andWhere('a.id = :activity_id')
            ->andWhere('l.code = :lang_code')
            ->setParameter('activity_id', $activity->getId())
            ->setParameter('lang_code', $locale)
            ->getQuery()->getResult();
        $families = $this->getDoctrine()->getRepository('AppBundle:ToolFamily')->findAll();

        return $this->render('activities/show.html.twig', array(
            'activity' => $activity,
            'task' => $activity->getTask(),
            'tutorials' => $tutorials,
            'resources' => $resources,
            'families' => $families,
            'navTasks' => $navService->getTasks()
        ));
    }
}