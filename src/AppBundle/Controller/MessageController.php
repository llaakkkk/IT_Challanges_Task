<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Message;
use AppBundle\Entity\User;
use AppBundle\Service\MessageService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{

    /**
     * @Route("/", name="main")
     * @Method({"GET", "POST"})
     *
     * @param Request        $request
     * @param MessageService $messageService
     *
     * @return Response
     */
    public function messagesListAction(Request $request, MessageService $messageService)
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            $this->addFlash('failed', 'User not login');

            return $this->redirectToRoute('login');
        }

        $message = new Message();

        $form = $this->createFormBuilder($message)
                     ->add('messageBody', TextType::class)
                     ->add('save', SubmitType::class, ['label' => 'Post!'])
                     ->getForm();

        $form->handleRequest($request);

        $messages = $messageService->getUserMessages($user);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();

            $messageService->createMessage($message, $user);

            return $this->redirectToRoute('main');
        }

        return $this->render(
            'messages/list.html.twig',
            [
                'form'     => $form->createView(),
                'messages' => $messages
            ]
        );
    }


}