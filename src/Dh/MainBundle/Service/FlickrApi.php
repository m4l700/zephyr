<?php

namespace Dh\MainBundle\Service;

class FlickrApi{

  /*
  * Function to get the most recent photos from the Flickr API.
  * @ToDo Database connection for API key and user ID, Probably even other methods aswell.
  * And make things way more efficient/OOP..
  */
  public function getPhotos($apiKey, $userID, $numberOfPhotos){
    //Variables
    $apikey = $apiKey;
    $secret = '2b74f4d773523284';
    $userId = $userID;
    $url = 'https://api.flickr.com/services/rest/?method=flickr.people.getPhotos';
    $url.= '&api_key='.$apikey;
    $url.= '&user_id='.$userId;
    $url.= '&per_page='.$numberOfPhotos;
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

      print "<div class='col-lg-6 col-md-4 col-xs-6 thumb'>";
      print "<a class='thumbnail' href='".$photoUrl."'>";
      print "<img class='img-responsive' title='".$title."' src='".$photoUrl."' />";
      print "</a>";
      print "</div>";
    }

  }

}
