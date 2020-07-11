<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/{route}", name="vue_pages", requirements={"route"="^.+"}, defaults={"route": null})
     */
    public function front()
    {
        return $this->render('base-app.html.twig');
    }
}
