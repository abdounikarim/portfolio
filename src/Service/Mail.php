<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;

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

    public function send($values)
    {
        $email = (new TemplatedEmail())
            ->from($values['email'])
            ->to('abdounikarim@gmail.com')
            ->subject('Contact')
            ->htmlTemplate('email.html.twig')
            ->context([
                'values' => $values,
            ])
        ;
        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            throw new TransportException('Problème d\'envoi du mail');
        }
    }
}
