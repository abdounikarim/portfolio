<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    private $imagesForSkills = ['html', 'css', 'javascript', 'php', 'mysql', 'git', 'react', 'sass'];
    private $imagesForExperiences = ['oc.png', 'symfony.svg', 'abdounikarim.png'];
    private $imagesForProjects = ['alaska.jpg', 'louvre.jpg', 'strasbourg.png'];
    private $path = 'uploads/files/';

    public function load(ObjectManager $manager)
    {
        foreach ($this->imagesForSkills as $image) {
            $imageEntity = new Image();
            $imageEntity->setName($this->path.$image.'.svg');
            $imageEntity->setAlt(strtoupper($image));
            $manager->persist($imageEntity);
            $this->addReference('image-for-skill-'.$image, $imageEntity);
        }

        foreach ($this->imagesForExperiences as $image) {
            $imageEntity = new Image();
            $imageEntity->setName($this->path.$image);
            $imageEntity->setAlt(strtoupper($image));
            $manager->persist($imageEntity);
            $this->addReference('image-for-experience-'.$image, $imageEntity);
        }

        foreach ($this->imagesForProjects as $image) {
            $imageEntity = new Image();
            $imageEntity->setName($this->path.$image);
            $imageEntity->setAlt(strtoupper($image));
            $manager->persist($imageEntity);
            $this->addReference('image-for-project-'.$image, $imageEntity);
        }

        $manager->flush();
    }
}
