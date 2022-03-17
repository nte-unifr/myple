<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\NavService;

class MainController extends Controller
{
  /**
   * @Route("/")
   */
  public function indexAction(Request $request)
  {
    $path = $request->getBasePath();
    $locale = $request->getLocale();
    return $this->redirect($path.'/'.$locale);
  }

  /**
   * @Route("/{_locale}", name="home")
   */
  public function homeAction(Request $request, NavService $navService)
  {
    $tasksNb = $this->getDoctrine()->getRepository("AppBundle:Task")->countAll();
    $activitiesNb = $this->getDoctrine()->getRepository("AppBundle:Activity")->countAll();

    $toolsFamiliesNb = $this->getDoctrine()->getRepository("AppBundle:ToolFamily")->countAll();
    $toolsNb = $this->getDoctrine()->getRepository("AppBundle:Tool")->countAll();

    $formationsNb = $this->getDoctrine()->getRepository("AppBundle:Formation")->countAll();

    $news = $this->getDoctrine()->getRepository("AppBundle:News")->getRecentNews();

    return $this->render('index/index.html.twig', array(
      'navTasks' => $navService->getTasks(),
      'tasksNb' => $tasksNb,
      'activitiesNb' => $activitiesNb,
      'toolsFamiliesNb' => $toolsFamiliesNb,
      'toolsNb' => $toolsNb,
      'formationsNb' => $formationsNb,
      'news' => $news
    ));
  }
}