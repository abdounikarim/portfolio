<?php

namespace App\Service;

use App\Entity\Contact;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class Mail
{
    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function send(Contact $contact)
    {
        $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            ->to('abdounikarim@gmail.com')
            ->subject('Contact')

            // path of the Twig template to render
            ->htmlTemplate('front/email.html.twig')

            // pass variables (name => value) to the template
            ->context([
                'contact' => $contact,
            ])
        ;
        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            throw new TransportException('Problème d\'envoi du mail');
        }
    }
}