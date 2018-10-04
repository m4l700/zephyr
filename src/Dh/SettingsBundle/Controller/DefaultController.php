<?php

namespace Dh\SettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Dh\MainBundle\Service\Backup;

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
    //var_dump(getcwd());

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


}
