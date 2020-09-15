<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 * @ApiResource(
 *     collectionOperations={"post"},
 *     itemOperations={}
 * )
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner un nom")
     * @Assert\Length(
     *     min=2, minMessage="Vous devez renseigner un minimum de {{ limit }} caractères",
     *     max="255", maxMessage="Vous devez renseigner un maximum de {{ limit }} caractères",
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="Merci de renseigner un email valide")
     * @Assert\NotBlank(message="Merci de renseigner un email")
     * @Assert\Length(
     *     min=2, minMessage="Vous devez renseigner un minimum de {{ limit }} caractères",
     *     max="255", maxMessage="Vous devez renseigner un maximum de {{ limit }} caractères",
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="Merci de renseigner un message")
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
