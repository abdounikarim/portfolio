<?php

namespace App\Controller;

use App\Repository\ExperienceRepository;

class ExperienceReport
{
    private $experienceRepository;

    public function __construct(ExperienceRepository $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function __invoke()
    {
        $entity = $this->experienceRepository->findOneBy(['id' => 7]);
        dd($entity);
    }
}
