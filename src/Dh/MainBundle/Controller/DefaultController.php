<?php

namespace Dh\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Dh\MainBundle\Service\FlickrApi;
use Dh\MainBundle\Service\RssFeed;
use Dh\MainBundle\Service\Crawler;
use Dh\MainBundle\Entity\Rss;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Service RssFeed
      $rssFeed = new RssFeed;

      //RSS Entity
      $RSS = $this->getDoctrine()->getRepository('DhMainBundle:Rss');
      $RSSfeed = $RSS->findAll(); //Find all feeds
      $RSSactiveDashboard = $RSS->findBy(array('activeDashboard' => '1')); //get feeds that are active on dashboard

      //Count active RSS feeds on dashboard
      $rssCountActive = $rssFeed->countRssFeeds($RSSactiveDashboard);

      //Count all feeds
      $rssCount = $rssFeed->countRssFeeds($RSSfeed);

      //Renders template
      return $this->render('DhMainBundle:Dash:index.html.twig',array(
        'username' => $username,
        'feed' => $rssFeed,
        'rssEnt' => $RSSfeed,
        'rssCountActive' => $rssCountActive,
        'rssCount' => $rssCount,
      ));
    }

    /**
     * Work in progress idea
     * @Route("/upload")
     */
    public function uploadAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Service RssFeed
      $rssFeed = new RssFeed;

      //RSS Entity
      $RSS = $this->getDoctrine()->getRepository('DhMainBundle:Rss');
      $RSSfeed = $RSS->findAll(); //Find all feeds
      $RSSactiveDashboard = $RSS->findBy(array('activeDashboard' => '1')); //get feeds that are active on dashboard

      //Count active RSS feeds on dashboard
      $rssCountActive = $rssFeed->countRssFeeds($RSSactiveDashboard);

      //Count all feeds
      $rssCount = $rssFeed->countRssFeeds($RSSfeed);

      //Renders template
      return $this->render('DhMainBundle:Dash:upload.html.twig',array(
        'username' => $username,
      ));
    }

    /**
    * Work in progress idea
     * @Route("/share")
     */
    public function shareAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Service RssFeed
      $rssFeed = new RssFeed;

      //RSS Entity
      $RSS = $this->getDoctrine()->getRepository('DhMainBundle:Rss');
      $RSSfeed = $RSS->findAll(); //Find all feeds
      $RSSactiveDashboard = $RSS->findBy(array('activeDashboard' => '1')); //get feeds that are active on dashboard

      //Count active RSS feeds on dashboard
      $rssCountActive = $rssFeed->countRssFeeds($RSSactiveDashboard);

      //Count all feeds
      $rssCount = $rssFeed->countRssFeeds($RSSfeed);

      //Renders template
      return $this->render('DhMainBundle:Dash:share.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * Work in progress idea
     * @Route("/photos")
     */
    public function photosAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Service RssFeed
      $rssFeed = new RssFeed;

      //RSS Entity
      $RSS = $this->getDoctrine()->getRepository('DhMainBundle:Rss');
      $RSSfeed = $RSS->findAll(); //Find all feeds
      $RSSactiveDashboard = $RSS->findBy(array('activeDashboard' => '1')); //get feeds that are active on dashboard

      //Count active RSS feeds on dashboard
      $rssCountActive = $rssFeed->countRssFeeds($RSSactiveDashboard);

      //Count all feeds
      $rssCount = $rssFeed->countRssFeeds($RSSfeed);

      //Renders template
      return $this->render('DhMainBundle:Dash:photos.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * Work in progress idea
     * @Route("/categorize")
     */
    public function categorizeAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Renders template
      return $this->render('DhMainBundle:Dash:categorize.html.twig',array(
        'username' => $username,
      ));
    }

    /**
     * Work in progress idea
     * @Route("/crawler")
     */
    public function crawlerAction()
    {
      //Get logged in username.
      $username = $this->getUser();

      //Get crawlersettings from DB
      $em = $this->getDoctrine()->getManager();
      $crawlerRepo = $em->getRepository('DhSettingsBundle:Crawlerdata');
      $crawlerAll = $crawlerRepo->findBy(array(), array("id" => "DESC"), 35);

      //Renders template
      return $this->render('DhMainBundle:Dash:crawler.html.twig',array(
        'username' => $username,
        'crawler' => $crawlerAll,
      ));
    }

}
