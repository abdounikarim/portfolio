<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function front(Request $request, ProjectRepository $projectRepository)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
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
