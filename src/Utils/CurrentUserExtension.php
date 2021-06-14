<?php

namespace App\Utils;

//src/Utils/CurentUserExtension.php



use App\Entity\Entreprises;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Security\Core\Security;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryItemExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;
use ReflectionClass;

class CurrentUserExtension implements QueryCollectionExtensionInterface, QueryItemExtensionInterface
{

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function applyToCollection(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, string $operationName = null)
    {


        $this->addWhere($resourceClass, $queryBuilder);
    }

    public function applyToItem(QueryBuilder $queryBuilder, QueryNameGeneratorInterface $queryNameGenerator, string $resourceClass, array $identifiers, string $operationName = null, array $context = [])
    {
        $this->addWhere($resourceClass, $queryBuilder);
    }

    private function addWhere($resourceClass, QueryBuilder $queryBuilder)
    {
        $reflectionClass = new ReflectionClass($resourceClass);

        if ($reflectionClass->implementsInterface(UserOwnedInterface::class)) {
            $alias = $queryBuilder->getRootAliases()[0];

            $user = $this->security->getUser();
            if ($user) {
                $queryBuilder
                    ->andWhere("$alias.user_id = :current_user")
                    ->setParameter("current_user", $user->getId());
            } else {
                $queryBuilder;
            }
        }
    }
}
