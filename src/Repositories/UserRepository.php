<?php
namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param string $sortColumn
     *
     * @return array
     */
    public function findAllSorted($sortColumn)
    {
        return $this->createQueryBuilder('user')
            ->leftJoin('user.centre', 'centre')
            ->orderBy($sortColumn, 'asc')
            ->getQuery()
            ->getResult();
    }
}