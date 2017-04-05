<?php

namespace Dh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dh\MainBundle\Entity\User;

/**
 * Rss
 *
 * @ORM\Table(name="rss")
 * @ORM\Entity(repositoryClass="Dh\MainBundle\Repository\RssRepository")
 */
class Rss
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="Dh\MainBundle\Entity\User")
     * @ORM\JoinColumn(name="id", referencedColumnName="id")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="feedName", type="string", length=255)
     */
    private $feedName;

    /**
     * @var string
     *
     * @ORM\Column(name="feedUrl", type="string", length=255)
     */
    private $feedUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="siteUrl", type="string", length=255)
     */
    private $siteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;


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
     * Set feedName
     *
     * @param string $feedName
     *
     * @return Rss
     */
    public function setFeedName($feedName)
    {
        $this->feedName = $feedName;

        return $this;
    }

    /**
     * Get feedName
     *
     * @return string
     */
    public function getFeedName()
    {
        return $this->feedName;
    }

    /**
     * Set feedUrl
     *
     * @param string $feedUrl
     *
     * @return Rss
     */
    public function setFeedUrl($feedUrl)
    {
        $this->feedUrl = $feedUrl;

        return $this;
    }

    /**
     * Get feedUrl
     *
     * @return string
     */
    public function getFeedUrl()
    {
        return $this->feedUrl;
    }

    /**
     * Set siteUrl
     *
     * @param string $siteUrl
     *
     * @return Rss
     */
    public function setSiteUrl($siteUrl)
    {
        $this->siteUrl = $siteUrl;

        return $this;
    }

    /**
     * Get siteUrl
     *
     * @return string
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Rss
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}
