<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PagesController extends Controller
{
    /**
     * @Route("/{_locale}/about", name="about")
     */
    public function aboutAction()
    {
        return $this->render('pages/about.html.twig', array());
    }
}