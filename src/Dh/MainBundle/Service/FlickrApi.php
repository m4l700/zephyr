<?php

namespace Dh\MainBundle\Service;

class FlickrApi{
  public function getPhotos($apiKey, $userID){
    //Variables
    //$apiKey = '5d87db687e7084fdb203ee90f38bc0c0';
    $apikey = $apiKey;
    $secret = '2b74f4d773523284';
    $userId = $userID;
    //$userID = '75617896%40N08';
    $url = 'https://api.flickr.com/services/rest/?method=flickr.people.getPhotos';
    $url.= '&api_key='.$apikey;
    $url.= '&user_id='.$userId;
    $url.= '&per_page=28';
    $url.= '&format=json';
    $url.= '&nojsoncallback=1';

    $response = json_decode(file_get_contents($url));
    $photoArray = $response->photos->photo;

    foreach($photoArray as $singlePhoto){
      $farmId = $singlePhoto->farm;
      $serverId = $singlePhoto->server;
      $photoId = $singlePhoto->id;
      $secretId = $singlePhoto->secret;
      //$size = 'm';

      $title = $singlePhoto->title;

      $photoUrl = 'http://farm'.$farmId.'.staticflickr.com/'.$serverId.'/'.$photoId.'_'.$secretId.'.'.'jpg';

      print "<div class='col-lg-4 col-md-4 col-xs-6 thumb'>";
      print "<a class='thumbnail' href='".$photoUrl."'>";
      print "<img class='img-responsive' title='".$title."' src='".$photoUrl."' />";
      print "</a>";
      print "</div>";
    }
  }
}
