<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateAdminCommand extends Command
{
    protected static $defaultName = 'create:admin';
    /**
     * @var UserPasswordEncoderInterface
     */
    private $userPasswordEncoder;
    /**
     * @var ValidatorInterface
     */
    private $validator;

    private $error;

    private $errorMessages;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(ValidatorInterface $validator, UserPasswordEncoderInterface $userPasswordEncoder, EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->userPasswordEncoder = $userPasswordEncoder;
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Create a new administrator with the ROLE_ADMIN')
            ->setHelp('This command allows you to create an administrator')
            ->addArgument('email')
            ->addArgument('pass')
        ;
    }

    protected function interact(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        $email = $symfonyStyle->ask('Veuillez saisir un email', null, [$this, 'emailValidator']);
        $input->setArgument('email', $email);

        $pass = $symfonyStyle->askHidden('Veuillez saisir un mot de passe');
        $pass2 = $symfonyStyle->askHidden('Veuillez confirmer votre mot de passe');
        if ($pass === $pass2) {
            $input->setArgument('pass', $pass);
            $symfonyStyle->success('Les deux mots de passe sont identiques');

            $symfonyStyle->note('Vérification des champs en cours');
            $message = $this->checkUser($email, $pass);
            if (null !== $message) {
                foreach ($this->errorMessages as $errorMessage) {
                    $symfonyStyle->error($errorMessage);
                }

                return $symfonyStyle->error('Veuillez recommencer');
            }
        }

        return $symfonyStyle->error('Les mots de passe ne correspondent pas');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);
        $confirm = $symfonyStyle->confirm('Confirmez-vous la création de l\'administrateur ?');
        if ($confirm) {
            $this->createAdmin($input->getArgument('email'), $input->getArgument('pass'));

            $symfonyStyle->success('Le nouvel administrateur a bien été créé');

            return 0;
        }
        $symfonyStyle->error('Confirmation annulée');

        return 1;
    }

    private function checkUser($email, $pass)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($pass);
        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            foreach ($errors as $error) {
                $this->errorMessages[] = $error->getMessage();
            }
            $errorsString = (string) $errors;
            $this->error = true;

            return $errorsString;
        }
        $this->error = false;

        return null;
    }

    private function createAdmin($email, $pass)
    {
        $user = new User();
        $password = $this->userPasswordEncoder->encodePassword($user, $pass);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setRoles(['ROLE_ADMIN']);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function emailValidator($email)
    {
        if (empty($email)) {
            throw new UnexpectedValueException('L\'email ne doit pas être vide', 'string');
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new UnexpectedValueException('L\'email est invalide', 'string');
        }

        return $email;
    }
}
