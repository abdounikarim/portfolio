<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="front")
     * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!api).+"})
     */
    public function front(Request $request, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $errors = null;
        if ($request->request->get('contact')) {
            $json = json_encode($request->request->get('contact'));
            $contact = $serializer->deserialize($json, Contact::class, 'json');
            $errors = $validator->validate($contact);
        }

        return $this->render('base-app.html.twig', [
            'errors' => $serializer->serialize($errors, 'json'),
        ]);
    }
}
