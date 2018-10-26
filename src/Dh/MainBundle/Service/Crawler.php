<?php

namespace Dh\MainBundle\Service;

/**
 * Main crawler class
 */
class Crawler
{

  private $html;
  private $url;

  public function __construct($url){
    $this->url = $url;
  }

  public function urlToString($url) {
    $str = file_get_contents($url);
  }

  public function crawler($searchTerm, $crawlLimit=8) {
    $doc = new \DOMDocument;
    $doc->preserveWhiteSpace = false;
    $doc->strictErrorChecking = false;
    $doc->recover = true;
    $internalErrors = libxml_use_internal_errors(true);
    $doc->loadHTMLFile($this->url);
    libxml_use_internal_errors($internalErrors);

    //xpath
    $xpath = new \DOMXPath($doc);
    $internalErrors = libxml_use_internal_errors(true);
    //Query to search for(div)
    //$query = "//div[@class='$searchTerm']";
    $query = "//*[@class='$searchTerm']"; //Searchs for all elements with this class.
    $entries = $xpath->query($query);

    $i=0;
    foreach($entries as $itemz){
      if($i < $crawlLimit){
        $i++;
        $items = $entries->item($i)->textContent;
        $arrayItems[] = $items;
      }
    }
    return $arrayItems;

    unset($i);
  }

}
