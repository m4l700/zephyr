<?php

namespace Dh\MainBundle\Service;
use Dh\MainBundle\Entity\Rss;

class RssFeed{

  /*
  * @ToDo Database connection, get url from database --> Done.
  */
  function getFeed($feedUrl, $limiter=5) { //Default limiter to 5
    //Sets $xml variable
    $xml = simplexml_load_file($feedUrl);

    echo "<div class='list-group revealEle' style='display: block;'>";

    $i=0; //Sets $i to 0 as a looplimiter

    //Starts foreach loop based on $xml, and sets item(s) as $item.
    foreach($xml->channel->item as $item) if ($i < $limiter) {
      echo "<a href='$item->link'";
      echo "class='list-group-item' target='_blank'";
      echo "title='$item->title'>" . $item->title . "</a>";
      $i +=1; //Each loop sets $i + 1, till limiter is reached.
    }

    echo "</div>";

  }

  /*
  * Function to count the amount of feeds
  */
  function countRssFeeds($feed) {
    $rssCount = count($feed);
    return $rssCount;
  }

}
