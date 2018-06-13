<?php
namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param string $sortColumn
     * @param string $sortByDirection
     *
     * @return mixed
     */
    public function findAllSorted($sortColumn, $sortByDirection = 'asc')
    {
        return $this->createQueryBuilder('user')
            ->leftJoin('user.centre', 'centre')
            ->orderBy($sortColumn, $sortByDirection)
            ->getQuery()
            ->getResult();
    }
}