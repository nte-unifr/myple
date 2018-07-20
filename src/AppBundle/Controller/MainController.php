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
    $locale = $request->getLocale();
    return $this->redirect('/'.$locale);
  }
}