<?php

namespace App\Controller;

use App\Form\Model\ContactFormModel;
use App\Service\Mail;
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
    public function front(Request $request, SerializerInterface $serializer, ValidatorInterface $validator, Mail $mail)
    {
        $errors = [];
        $values = $request->request->get('contact');
        if ($values) {
            $json = json_encode($values);
            $contact = $serializer->deserialize($json, ContactFormModel::class, 'json');
            $errors = $validator->validate($contact);
        }

        if (0 === count($errors) && $request->isMethod('POST')) {
            //Send the mail with data
            $mail->send($values);
            //Add flash message
            $this->addFlash('contact', 'Votre message a bien été envoyé');
            //Redirect to home
            return $this->redirectToRoute('front');
        }

        return $this->render('base-app.html.twig', [
            'errors' => $serializer->serialize($errors, 'json'),
        ]);
    }
}
