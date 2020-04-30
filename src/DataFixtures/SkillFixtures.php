<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SkillFixtures extends Fixture implements DependentFixtureInterface
{
    private $names = ['html', 'css', 'javascript', 'php', 'mysql', 'git', 'react', 'sass'];

    public function load(ObjectManager $manager)
    {
        foreach ($this->names as $key => $name) {
            $skill = new Skill();
            $skill->setName($name);
            $skill->setImage($this->getReference('image-for-skill-'.$name));
            $manager->persist($skill);
            $this->addReference('skill-'.$key, $skill);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ImageFixtures::class,
        ];
    }
}
