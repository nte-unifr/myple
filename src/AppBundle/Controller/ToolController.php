<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ToolController extends Controller
{
    /**
     * @Route("/tools", name="tools_index")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Tool");
        $tools = $repository->findAll();

        $familiyRepository = $this->getDoctrine()->getRepository("AppBundle:ToolFamily");
        $families = $familiyRepository->findAll();

        return $this->render('tools/index.html.twig', array(
            'tools' => $tools,
            'families' => $families
        ));
    }
}