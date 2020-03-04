<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProjectRepository;
use App\Service\Mail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function front(Request $request, Mail $mail, ProjectRepository $projectRepository)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $mail->send($form->getData());
            $this->addFlash('contact', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('front');
        }
        return $this->render('front/index.html.twig', [
            'projects' => $projectRepository->findLastFourth(),
            'form' => $form->createView(),
        ]);
    }

    public function experiences()
    {

    }

    public function experience()
    {

    }

    public function projects()
    {

    }

    public function project()
    {

    }

    public function legal()
    {

    }
}
