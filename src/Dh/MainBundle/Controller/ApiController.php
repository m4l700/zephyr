<?php

namespace Dh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Dh\MainBundle\Service\FlickrApi;

class ApiController extends Controller
{
    /**
     * @Route("/api/flickr")
     */
    public function flickrAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Fetching from DB
      $repository = $this->getDoctrine()->getRepository('DhMainBundle:Flickr');
      $flickr = $repository->findById('1');
      $keys = array_keys($flickr);
      foreach ($flickr as $key) {
        $apikey = $key->apiKey;
        $userid = $key->userId;
        $apisecret = $key->apiSecret;
        $numberofphotos = $key->numberOfPhotos;
        $apiurl = $key->apiURL;
      }

      //Service flickrApi
      $flickrApi = new FlickrApi($apikey, $userid, $apisecret, $apiurl);
      $flickrApi->setNumberOfPhotos($numberofphotos);
      $getPhotos = $flickrApi->getPhoto();

      //Renders template
      return $this->render('DhMainBundle:Flickr:flickr.html.twig',array(
        'username' => $username,
        'photos' => $getPhotos,
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
      return $this->render('DhMainBundle:Flickr:facebook.html.twig',array(
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
      return $this->render('DhMainBundle:Flickr:twitter.html.twig',array(
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
      return $this->render('DhMainBundle:Flickr:google.html.twig',array(
        'username' => $username,
      ));
    }
}
