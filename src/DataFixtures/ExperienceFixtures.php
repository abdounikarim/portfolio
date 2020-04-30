<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ExperienceFixtures extends Fixture implements DependentFixtureInterface
{
    private $imagesForExperiences = ['oc.png', 'symfony.svg', 'abdounikarim.png'];

    public function load(ObjectManager $manager)
    {
        foreach ($this->imagesForExperiences as $key => $image) {
            $value = $key++;
            $experience = new Experience();
            $experience->setTitle('Experience '.$value);
            $experience->setDescription('Experience description'.$value);
            $experience->setStarted(new DateTime());
            $experience->setImage($this->getReference('image-for-experience-'.$image));
            $experience->addSkill($this->getReference('skill-'.rand(1, 2)));
            $experience->addSkill($this->getReference('skill-'.rand(3, 4)));
            $experience->addSkill($this->getReference('skill-'.rand(5, 6)));
            $manager->persist($experience);
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
