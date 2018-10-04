<?php

namespace Dh\SettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
  /**
   * @Route("/settings")
   */
  public function indexAction()
  {
    //Get logged in username.
    $username = $this->getUser();

    //Renders template
    return $this->render('DhSettingsBundle:Main:settings.html.twig',array(
      'username' => $username,
    ));
  }

  /**
   * @Route("/settings/api")
   */
  public function apiAction()
  {
    //Get logged in username.
    $username = $this->getUser();

    //Renders template
    return $this->render('DhSettingsBundle:Api:api.html.twig',array(
      'username' => $username,
    ));
  }

}
