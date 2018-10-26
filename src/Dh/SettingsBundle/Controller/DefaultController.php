<?php

namespace Dh\SettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Dh\MainBundle\Service\Backup;
use Dh\MainBundle\Service\Crawler;
use Dh\SettingsBundle\Entity\Crawlerdata;

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


  /**
   * @Route("/settings/backup")
   */
  public function backupAction()
  {
    //Get logged in username.
    $username = $this->getUser();

    //Renders template
    return $this->render('DhSettingsBundle:Backup:backup.html.twig',array(
      'username' => $username,
    ));
  }


  /**
   * @Route("/settings/backup/create")
   */
  public function backupcreateAction()
  {
    //Get logged in username.
    $username = $this->getUser();

    //backup
    $backup = new Backup;
    $backup->makeZip();
    $backup->pwd();

    if($backup){
      $this->addFlash(
        'notice',
        'Backup has been created!'
      );
      return $this->redirectToRoute('dh_settings_backup');
    }

    //Renders template
    return $this->render('DhSettingsBundle:Backup:backup.html.twig',array(
      'username' => $username,
    ));
  }



  /**
   * Function to run crawler to add crawled data to DB
   * @Route("/settings/runcrawler")
   */
  public function runcrawlerAction()
  {
    //Get logged in username.
    $username = $this->getUser();

    //Get crawlersettings from DB
    $em = $this->getDoctrine()->getManager();
    $crawlerRepo = $em->getRepository('DhSettingsBundle:Crawlersettings');
    $crawlerAll = $crawlerRepo->findBy(array("active" => "1"));
    foreach ($crawlerAll as $key) {
      $crawlId = $key->id;
      $crawlName = explode(" ", $key->name);
      $crawlUrl = $key->crawlurl;
      $crawlProductclass = $key->productclass;
      $crawler = new Crawler($crawlUrl);
      $crawl[] = $crawler->crawler($crawlProductclass);
      $nameToDb[] = $crawlName;
    }

    //Query to remove previous data in DB
    $queryDB = $em->createQuery('DELETE FROM DhSettingsBundle:Crawlerdata');
    $dbDelete = $queryDB->execute();

    $i=0;
    foreach($crawl as $crawlitem){
      $escapedCrawlValues = array_values($crawl[$i]);
      $escapedCrawlNames = array_values($nameToDb[$i]);
      $trimmedValues = str_replace("\n", "", $escapedCrawlValues);//WIP to remove spaces and newLines.
      $trimmedValues = str_replace("\r", "", $trimmedValues);//WIP to remove spaces and newLines.
      $trimmedValues = str_replace("\t", "", $trimmedValues);//WIP to remove spaces and newLines.
      $trimmedValues = preg_replace("/\r+|\n+/", "", $trimmedValues);

      $trimmedNames = str_replace("\n", "", $escapedCrawlNames);//WIP to remove spaces and newLines.
      $trimmedNames = str_replace("\r", "", $trimmedNames);//WIP to remove spaces and newLines.
      $trimmedNames = str_replace("\t", "", $trimmedNames);//WIP to remove spaces and newLines.
      $trimmedNames = preg_replace("/\r+|\n+/", "", $trimmedNames);

      //ToDo, put name(crawled location) into DB --> Done.
      foreach ($trimmedValues as $keyCrawl) {
        $encodedCrawl = json_encode($keyCrawl);
        $encodedNames = json_encode($escapedCrawlNames);

        //Put in DB
        $crawlerDB = new Crawlerdata;
        $crawlerDB->setText($encodedCrawl);
        $crawlerDB->setName($encodedNames);
        $em->persist($crawlerDB);
        $em->flush();
      }
      $i++;
    }

    if($crawlerDB){
      $this->addFlash(
        'notice',
        'Crawler has been run!'
      );
      return $this->redirectToRoute('dh_main_default_crawler');
    }
  }


}
