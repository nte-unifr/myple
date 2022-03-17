<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\NavService;

class FormationController extends Controller
{
    /**
     * @Route("/{_locale}/formations", name="formations_index")
     */
    public function indexAction(Request $request, NavService $navService)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Formation");
        $locale = ucfirst($request->getLocale());
        $sort = 'title'.$locale;
        $formations = $repository->findBy(array(), array($sort => 'ASC'));

        //$formations = $repository->findAll();

        return $this->render('formations/index.html.twig', array(
            'formations' => $formations,
            'navTasks' => $navService->getTasks()
        ));
    }
}