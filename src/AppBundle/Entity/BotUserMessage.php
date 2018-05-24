<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BotUserMessage
 *
 * @ORM\Table(name="bot_user_message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BotUserMessageRepository")
 */
class BotUserMessage
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
     * @ORM\OneToOne(targetEntity="Bot",
     * inversedBy="id")
     * @ORM\Column(name="bot_id", type="integer")
     */

     private $bot;


    /**
     * @var Message
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Message", inversedBy="botUserMessage", cascade={"persist"})
     * @ORM\JoinColumn(name="message_id", referencedColumnName="id", nullable=false)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="answer_message", type="string", length=255)
     */
    private $answerMessage;


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
     * @param Bot $bot
     */
    public function setBot($bot)
    {
        $this->bot = $bot;
    }

    /**
     * @return Bot
     */
    public function getBot()
    {
        return $this->bot;
    }

    /**
     *
     * @param Message $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return Message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set answerMessage
     *
     * @param string $answerMessage
     */
    public function setAnswerMessage($answerMessage)
    {
        $this->answerMessage = $answerMessage;
    }

    /**
     * Get answerMessage
     *
     * @return string
     */
    public function getAnswerMessage()
    {
        return $this->answerMessage;
    }
}

