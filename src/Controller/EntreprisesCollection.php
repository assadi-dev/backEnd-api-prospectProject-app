<?php

namespace App\Controller;

use App\Entity\Entreprises;
use Doctrine\ORM\QueryBuilder;
use App\Repository\EntreprisesRepository;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryCollectionExtensionInterface;

class EntreprisesCollection
{
    public function __invoke(EntreprisesRepository $entreprisesRepo)
    {
        $qb = $entreprisesRepo->createQueryBuilder("Entreprises")
            ->orderBy("Entreprises.createAt", "DESC");
        $query = $qb->getQuery();
        return $query->execute();
    }
}
