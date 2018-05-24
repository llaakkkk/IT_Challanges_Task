<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="message_body", type="string", length=255)
     */
    private $messageBody;

    /**
     * @var int
     *
     * @ORM\Column(name="mentioned_user_id", type="integer", nullable=true)
     */
    private $mentionedUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var BotUserMessage[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BotUserMessage", mappedBy="message", cascade={"persist"})
     */
    private $botUserMessage;

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
     * Set userId
     *
     * @param integer $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set messageBody
     *
     * @param string $messageBody
     */
    public function setMessageBody($messageBody)
    {
        $this->messageBody = $messageBody;
    }

    /**
     * Get messageBody
     *
     * @return string
     */
    public function getMessageBody()
    {
        return $this->messageBody;
    }


    /**
     * Set mentionedUserId
     *
     * @param integer $mentionedUserId
     */
    public function setMentionedUserId($mentionedUserId)
    {
        $this->mentionedUserId = $mentionedUserId;
    }

    /**
     * Get mentionedUserId
     *
     * @return int
     */
    public function getMentionedUserId()
    {
        return $this->mentionedUserId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return BotUserMessage[]|ArrayCollection
     */
    public function getBotUserMessages()
    {
        return $this->botUserMessage;
    }


    /**
     * @param mixed $botUserMessage
     */
    public function setBotUserMessages($botUserMessage)
    {
        $this->botUserMessage = $botUserMessage;
    }

    /**
     * @param BotUserMessage $botUserMessage
     */
    public function addBotUserMessages(BotUserMessage $botUserMessage)
    {
        $this->botUserMessage->add($botUserMessage);
    }



}

