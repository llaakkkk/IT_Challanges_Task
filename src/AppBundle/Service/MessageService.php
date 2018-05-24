<?php


namespace AppBundle\Service;

use AppBundle\Entity\BotVocabulary;
use AppBundle\Entity\Message;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class MessageService
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getUserMessages(User $user)
    {
        $messages = $this->em->getRepository('AppBundle:Message')->getUserMessages($user);

        return $messages;
    }

    /**
     * @param Message $message
     * @param User    $user
     */
    public function createMessage(Message $message, User $user)
    {

        $createdMessage = $this->em->getRepository('AppBundle:Message')->createUserMessage($message, $user);

        $this->checkMessageToBot($createdMessage);

    }

    public function checkMessageToBot(Message $message)
    {

        $botVocabularies = $this->em->getRepository('AppBundle:BotVocabulary')->findAll();


        foreach ($botVocabularies as $botVocabulary) {
            /** @var BotVocabulary $botVocabulary */

            $pattern = $this->getPattern($botVocabulary->getQuestion());


            $isQuestionExist = preg_match($pattern, $message->getMessageBody());

            if ($isQuestionExist) {
                $this->em->getRepository('AppBundle:BotUserMessage')->createBotUserMessage($botVocabulary, $message);
            }

        }
    }

    public function getPattern($question)
    {
        $pattern = '/^' . $question . '/i';

        return str_replace('?', '\?', $pattern);
    }
}