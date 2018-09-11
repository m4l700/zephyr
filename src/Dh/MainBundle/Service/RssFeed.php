<?php

namespace Dh\MainBundle\Service;
use Dh\MainBundle\Entity\Rss;
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Doctrine\ORM\EntityManager;

class RssFeed{


  /*
  * @ToDo Database connection, get url from database --> Done.
  */
  function getFeed($feedUrl) {

    $xml = simplexml_load_file($feedUrl);

    echo "<div class='list-group revealEle' style='display: block;'>";
    $i=0;
    foreach($xml->channel->item as $item) if ($i < 7) {
      echo "<a href='$item->link'";
      echo "class='list-group-item' target='_blank'";
      echo "title='$item->title'>" . $item->title . "</a>";
      $i +=1;
    }

    echo "</div>";

  }

}
