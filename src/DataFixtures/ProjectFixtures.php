<?php

namespace App\DataFixtures;

use App\Entity\Project;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    private $imagesForProjects = ['alaska.jpg', 'louvre.jpg', 'strasbourg.png'];

    public function load(ObjectManager $manager)
    {
        foreach ($this->imagesForProjects as $image) {
            $project = new Project();
            $project->setName('Project');
            $project->setDescription('Project description');
            $project->setLink('https://project.com');
            $project->setStarted(new DateTime());
            $project->setImage($this->getReference('image-for-project-'.$image));
            $project->addSkill($this->getReference('skill-'.rand(1, 2)));
            $project->addSkill($this->getReference('skill-'.rand(3, 4)));
            $project->addSkill($this->getReference('skill-'.rand(5, 6)));
            $manager->persist($project);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ImageFixtures::class,
            SkillFixtures::class,
        ];
    }
}
