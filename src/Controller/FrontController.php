<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ExperienceRepository;
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
    public function front(Request $request, Mail $mail, ExperienceRepository $experienceRepository, ProjectRepository $projectRepository)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $mail->send($form->getData());
            $this->addFlash('contact', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('front');
        }
        return $this->render('front/index.html.twig', [
            'experiences' => $experienceRepository->findLastThree(),
            'projects' => $projectRepository->findLastFourth(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/experiences", name="experiences")
     */
    public function experiences(ExperienceRepository $experienceRepository)
    {
        return $this->render('front/experiences.html.twig', [
            'experiences' => $experienceRepository->findAll()
        ]);
    }

    public function experience()
    {

    }

    /**
     * @Route("/projets", name="projects")
     */
    public function projects(ProjectRepository $projectRepository)
    {
        return $this->render('front/projects.html.twig', [
            'projects' => $projectRepository->findAll()
        ]);
    }

    public function project()
    {

    }

    /**
     * @Route("/mentions-legales", name="legals")
     */
    public function legal()
    {
        return $this->render('front/legal.html.twig');
    }
}
