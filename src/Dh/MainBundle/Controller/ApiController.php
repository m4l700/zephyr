<?php

namespace Dh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ApiController extends Controller
{
    /**
     * @Route("/api/flickr")
     */
    public function flickrAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Flickr:flickr.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/api/facebook")
     */
    public function facebookAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Flickr:flickr.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/api/twitter")
     */
    public function twitterAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Flickr:flickr.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * @Route("/api/google")
     */
    public function googleAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Flickr:flickr.html.twig',array(
        'username' => $username,
      ));
    }
}
