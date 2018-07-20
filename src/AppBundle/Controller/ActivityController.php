<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ActivityController extends Controller
{
    /**
     * @Route("/{_locale}/activities/{id}", requirements={"id" = "\d+"}, name="activities_show")
     */
    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Activity");
        $activity = $repository->find($id);
        $tutorials = $this->getDoctrine()->getRepository('AppBundle:Resource')->createQueryBuilder('r')
            ->select('r', 'a')
            ->leftJoin('r.activities', 'a')
            ->where('r.tutorial = 1')
            ->andWhere('a.id = :activity_id')
            ->setParameter('activity_id', $activity->getId())
            ->getQuery()->getResult();
        $resources = $this->getDoctrine()->getRepository('AppBundle:Resource')->createQueryBuilder('r')
            ->select('r', 'a')
            ->leftJoin('r.activities', 'a')
            ->where('r.tutorial = 0')
            ->andWhere('a.id = :activity_id')
            ->setParameter('activity_id', $activity->getId())
            ->getQuery()->getResult();

        return $this->render('activities/show.html.twig', array(
            'activity' => $activity,
            'tutorials' => $tutorials,
            'resources' => $resources
        ));
    }
}