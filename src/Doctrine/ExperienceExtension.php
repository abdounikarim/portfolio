<?php

namespace App\Doctrine;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use App\Entity\Experience;
use App\Repository\ExperienceRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\HttpFoundation\RequestStack;

final class ExperienceExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{
    private $experienceRepository;
    private $requestStack;

    public function __construct(ExperienceRepository $experienceRepository, RequestStack $requestStack)
    {
        $this->experienceRepository = $experienceRepository;
        $this->requestStack = $requestStack;
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null): void
    {
        $this->addWhere($queryBuilder, $resourceClass);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = []): void
    {
        if ('api_experiences_get_report_item' !== $this->requestStack->getCurrentRequest()->attributes->get('_route')) {
            $this->addWhere($queryBuilder, $resourceClass);
        }
    }

    private function addWhere(QueryBuilder $queryBuilder, string $resourceClass): void
    {
        dd($this->experienceRepository->findLastThree());
        if (Experience::class !== $resourceClass) {
            return;
        }
        /*
        if ($this->security->isGranted('ROLE_ADMIN') || null === $user = $this->security->getUser()) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];
        $queryBuilder->andWhere(sprintf('%s.user = :current_user', $rootAlias));
        $queryBuilder->setParameter('current_user', $user->getId());
        */
    }
}
