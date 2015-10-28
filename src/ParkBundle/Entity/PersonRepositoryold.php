<?php

namespace ParkBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
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