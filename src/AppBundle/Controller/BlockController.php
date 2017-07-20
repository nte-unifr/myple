<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlockController extends Controller
{
    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        $repository = $this->getDoctrine()->getRepository("AppBundle:Block");
        $block = $repository->findOneBy(array('slug' => 'a-propos'));

        return $this->render('blocks/about.html.twig', array(
            'block' => $block
        ));
    }
}