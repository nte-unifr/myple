<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\NavService;

class ToolController extends Controller
{
    /**
     * @Route("/{_locale}/tools", name="tools_index")
     */
    public function indexAction(Request $request, NavService $navService)
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Tool");
        $tools = $repository->findAll();

        $locale = ucfirst($request->getLocale());
        $sort = 'name'.$locale;
        $familiyRepository = $this->getDoctrine()->getRepository("AppBundle:ToolFamily");
        $families = $familiyRepository->findBy(array(), array($sort => 'ASC'));

        return $this->render('tools/index.html.twig', array(
            'tools' => $tools,
            'families' => $families,
            'navTasks' => $navService->getTasks()
        ));
    }
}