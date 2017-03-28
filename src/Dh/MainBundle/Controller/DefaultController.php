<?php

namespace Dh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
      ));
    }
}
