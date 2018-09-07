<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
  /**
   * @Route("/", name="home")
   */
  public function indexAction(Request $request)
  {
    $path = $request->getBasePath();
    $locale = $request->getLocale();
    return $this->redirect($path.$locale);
  }
}