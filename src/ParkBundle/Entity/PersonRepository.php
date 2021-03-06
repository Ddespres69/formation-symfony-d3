<?php

namespace ParkBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PersonRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonRepository extends EntityRepository
{

    /**
     * @param $id
     * @return mixed
     */
    public function findOneWithComputersEnabled($id){
        return $this->createQueryBuilder('p')
            ->addSelect('c')
            ->leftJoin('p.computers', 'c', 'WITH', 'c.enabled = :enabled')
            ->setParameter('enabled', true)
            ->where('p = :person')
            ->setParameter('person', $id)
            ->getQuery()
            ->getSingleResult();
    }
}
