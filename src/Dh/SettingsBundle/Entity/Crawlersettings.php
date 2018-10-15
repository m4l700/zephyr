<?php

namespace Dh\SettingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Crawlersettings
 *
 * @ORM\Table(name="crawlersettings")
 * @ORM\Entity(repositoryClass="Dh\SettingsBundle\Repository\CrawlersettingsRepository")
 */
class Crawlersettings
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    public $name;

    /**
     * @var string
     *
     * @ORM\Column(name="productclass", type="string", length=255)
     */
    public $productclass;

    /**
     * @var string
     *
     * @ORM\Column(name="titleclass", type="string", length=255, nullable=true)
     */
    public $titleclass;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionclass", type="string", length=255, nullable=true)
     */
    public $descriptionclass;

    /**
     * @var string
     *
     * @ORM\Column(name="priceclass", type="string", length=255, nullable=true)
     */
    public $priceclass;

    /**
     * @var string
     *
     * @ORM\Column(name="crawlurl", type="string", length=255, nullable=true)
     */
    public $crawlurl;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    public $active;

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
     * Set name
     *
     * @param string $name
     *
     * @return Crawlersettings
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set productclass
     *
     * @param string $productclass
     *
     * @return Crawlersettings
     */
    public function setProductclass($productclass)
    {
        $this->productclass = $productclass;

        return $this;
    }

    /**
     * Get productclass
     *
     * @return string
     */
    public function getProductclass()
    {
        return $this->productclass;
    }

    /**
     * Set titleclass
     *
     * @param string $titleclass
     *
     * @return Crawlersettings
     */
    public function setTitleclass($titleclass)
    {
        $this->titleclass = $titleclass;

        return $this;
    }

    /**
     * Get titleclass
     *
     * @return string
     */
    public function getTitleclass()
    {
        return $this->titleclass;
    }

    /**
     * Set descriptionclass
     *
     * @param string $descriptionclass
     *
     * @return Crawlersettings
     */
    public function setDescriptionclass($descriptionclass)
    {
        $this->descriptionclass = $descriptionclass;

        return $this;
    }

    /**
     * Get descriptionclass
     *
     * @return string
     */
    public function getDescriptionclass()
    {
        return $this->descriptionclass;
    }

    /**
     * Set priceclass
     *
     * @param string $priceclass
     *
     * @return Crawlersettings
     */
    public function setPriceclass($priceclass)
    {
        $this->priceclass = $priceclass;

        return $this;
    }

    /**
     * Get priceclass
     *
     * @return string
     */
    public function getPriceclass()
    {
        return $this->priceclass;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Crawlersettings
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set crawlurl
     *
     * @param string $crawlurl
     *
     * @return Crawlersettings
     */
    public function setCrawlurl($crawlurl)
    {
        $this->crawlurl = $crawlurl;

        return $this;
    }

    /**
     * Get crawlurl
     *
     * @return string
     */
    public function getCrawlurl()
    {
        return $this->crawlurl;
    }
}
