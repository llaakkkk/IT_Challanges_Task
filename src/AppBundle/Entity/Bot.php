<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Bot
 *
 * @ORM\Table(name="bot")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BotRepository")
 */
class Bot
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var BotVocabulary[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BotVocabulary", mappedBy="bot", cascade={"persist"})
     */
    private $botVocabulary;

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return BotVocabulary[]|ArrayCollection
     */
    public function getBotVocabulary()
    {
        return $this->botVocabulary;
    }

    /**
     * @param BotVocabulary[]|ArrayCollection $botVocabulary
     */
    public function setBotVocabulary($botVocabulary)
    {
        $this->botVocabulary = $botVocabulary;
    }


}

