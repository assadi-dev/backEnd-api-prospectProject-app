<?php

namespace App\Controller;

use App\Repository\RendezVousRepository;

class RendezVousCollection
{
    public function __invoke(RendezVousRepository $rendezVousRepo)
    {
        $qb = $rendezVousRepo->createQueryBuilder("RDV")
            ->orderBy("RDV.createdAt", "DESC");
        $query = $qb->getQuery();
        return $query->execute();
    }
}
