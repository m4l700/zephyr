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

    /**
     * @Route("/upload")
     */
    public function uploadAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/share")
     */
    public function shareAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/photos")
     */
    public function photosAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/categorize")
     */
    public function categorizeAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/settings")
     */
    public function settingsAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
      ));
    }
}
