<?php

namespace Dh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flickr
 *
 * @ORM\Table(name="flickr")
 * @ORM\Entity(repositoryClass="Dh\MainBundle\Repository\FlickrRepository")
 */
class Flickr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="apiKey", type="string", length=255)
     */
    public $apiKey;

    /**
     * @var string
     *
     * @ORM\Column(name="userId", type="string", length=255)
     */
    public $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="apiSecret", type="string", length=255)
     */
    public $apiSecret;

    /**
     * @var int
     *
     * @ORM\Column(name="numberOfPhotos", type="integer")
     */
    public $numberOfPhotos;

    /**
     * @var string
     *
     * @ORM\Column(name="apiURL", type="string", length=255)
     */
    public $apiURL;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set apiKey
     *
     * @param string $apiKey
     *
     * @return Flickr
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get apiKey
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set userId
     *
     * @param string $userId
     *
     * @return Flickr
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set apiSecret
     *
     * @param string $apiSecret
     *
     * @return Flickr
     */
    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;

        return $this;
    }

    /**
     * Get apiSecret
     *
     * @return string
     */
    public function getApiSecret()
    {
        return $this->apiSecret;
    }

    /**
     * Set numberOfPhotos
     *
     * @param integer $numberOfPhotos
     *
     * @return Flickr
     */
    public function setNumberOfPhotos($numberOfPhotos)
    {
        $this->numberOfPhotos = $numberOfPhotos;

        return $this;
    }

    /**
     * Get numberOfPhotos
     *
     * @return int
     */
    public function getNumberOfPhotos()
    {
        return $this->numberOfPhotos;
    }

    /**
     * Set apiURL
     *
     * @param string $apiURL
     *
     * @return Flickr
     */
    public function setApiURL($apiURL)
    {
        $this->apiURL = $apiURL;

        return $this;
    }

    /**
     * Get apiURL
     *
     * @return string
     */
    public function getApiURL()
    {
        return $this->apiURL;
    }
}
