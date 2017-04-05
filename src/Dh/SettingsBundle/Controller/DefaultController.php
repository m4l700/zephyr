<?php

namespace Dh\SettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
  
  public function indexAction()
  {
    //Get logged in username.
    $username = $this->getUser();

    //Renders template
    return $this->render('DhMainBundle:Dash:settings.html.twig',array(
      'username' => $username,
    ));
  }
}
