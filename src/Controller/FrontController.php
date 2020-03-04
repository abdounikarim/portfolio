<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     */
    public function front(Request $request)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        return $this->render('front/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
