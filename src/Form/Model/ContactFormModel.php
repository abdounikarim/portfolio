<?php

namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class ContactFormModel
{
    /**
     * @Assert\NotBlank(message="Merci de renseigner un nom")
     * @Assert\Length(
     *     min=2, minMessage="Vous devez renseigner un minimum de {{ limit }} caractères",
     *     max="255", maxMessage="Vous devez renseigner un maximum de {{ limit }} caractères",
     * )
     */
    public $name;

    /**
     * @Assert\Email(message="Merci de renseigner un email valide")
     * @Assert\NotBlank(message="Merci de renseigner un email")
     * @Assert\Length(
     *     min=2, minMessage="Vous devez renseigner un minimum de {{ limit }} caractères",
     *     max="255", maxMessage="Vous devez renseigner un maximum de {{ limit }} caractères",
     * )
     */
    public $email;

    /**
     * @Assert\NotBlank(message="Merci de renseigner un message")
     */
    public $message;
}
