<?php

namespace Dh\MainBundle\Service;
use Dh\MainBundle\Entity\Rss;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Doctrine\ORM\EntityManager;

class RssFeed{


  /*
  * @ToDo Database connection, get url from database.
  */
  function getFeed($feedUrl) {

    $content = file_get_contents($feedUrl);
    $xml = new \SimpleXmlElement($content);

    //var_dump($xml);
    //die();

    echo "<div class='list-group revealEle' style='display: none;'>";

    foreach($xml->channel->item as $entry) {
        echo "<a class='list-group-item href='$entry->link' title='$entry->title'>" . $entry->title . "</a>";
    }
    echo "</div>";
  }

}
