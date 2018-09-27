<?php

namespace Dh\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="Dh\MainBundle\Repository\NoteRepository")
 */
class Note
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
     * @ORM\Column(name="noteName", type="string", length=255, nullable=true)
     */
    private $noteName;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * Set noteName
     *
     * @param string $noteName
     *
     * @return Note
     */
    public function setNoteName($noteName)
    {
        $this->noteName = $noteName;

        return $this;
    }

    /**
     * Get noteName
     *
     * @return string
     */
    public function getNoteName()
    {
        return $this->noteName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Note
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

