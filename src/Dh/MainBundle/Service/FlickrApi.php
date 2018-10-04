<?php

namespace Dh\MainBundle\Service;

class FlickrApi{

  private $apiKey;
  private $userID;
  private $numberOfPhotos;
  private $secret;
  private $url;

  public function __construct($apiKey, $userID, $secret, $apiUrl) {
    $this->apiKey = $apiKey;
    $this->userID = $userID;
    $this->secret = $secret;
    $this->url = $apiUrl;
  }

  function setNumberOfPhotos($numberofphotos){
    $this->numberOfPhotos = $numberofphotos;
  }


  /*
  * Function to get the most recent photos from the Flickr API.
  */
  public function getPhoto(){
    //Variables
    $apikey = $this->apiKey;
    $userId = $this->userID;
    $url = $this->url;
    $url.= '&api_key='.$this->apiKey;
    $url.= '&user_id='.$this->userID;
    $url.= '&per_page='.$this->numberOfPhotos;
    $url.= '&format=json';
    $url.= '&nojsoncallback=1';

    $response = json_decode(file_get_contents($url));
    $photoArray = $response->photos->photo;

    foreach($photoArray as $singlePhoto){
      $farmId = $singlePhoto->farm;
      $serverId = $singlePhoto->server;
      $photoId = $singlePhoto->id;
      $secretId = $singlePhoto->secret;
      $title = $singlePhoto->title;
      //$size = 'm';

      //Compiles URL
      $photoUrl = 'http://farm'.$farmId.'.staticflickr.com/'.$serverId.'/'.$photoId.'_'.$secretId.'.'.'jpg';

      //Puts all data in array to be used in frontend
      $arrayPhotos[] = array(
        'id'=>$photoId, 'farmID'=>$farmId, 'serverID'=>$serverId, 'title'=>$title, 'fullURL'=>$photoUrl
      );
    }
    return $arrayPhotos;
  }

}
