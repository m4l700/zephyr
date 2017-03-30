<?php

namespace Dh\MainBundle\Service;

class RssFeed{

  /*
  * @ToDo Database connection, get url from database.
  */
  function getFeed($feedUrl) {

    $content = file_get_contents($feedUrl);
    $xml = new \SimpleXmlElement($content);

    echo "<div class='list-group'>";

    foreach($xml->channel->item as $entry) {
        echo "<a class='list-group-item' href='$entry->link' title='$entry->title'>" . $entry->title . "</a>";
    }
    echo "</div>";
}


}
