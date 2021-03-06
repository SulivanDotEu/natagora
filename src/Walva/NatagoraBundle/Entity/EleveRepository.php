<?php

namespace Walva\NatagoraBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EvenementRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EleveRepository extends EntityRepository {

    public function myFind($id) {
        $query = $this->_em->createQuery('
            SELECT e, i 
            FROM WalvaNatagoraBundle:Evenement e
            JOIN e.inscription i 
            WHERE true = true');
        $resultats = $query->getResult();

        return $resultats;
    }

    public function myFindAll() {
        $qb = $this->createQueryBuilder('e')
                ->leftJoin('e.user', 'u')
                ->addSelect('u')
                ->leftJoin('e.formations', 'fion')
                ->addSelect('fion')
                ->leftJoin('e.inscriptions', 'ins')
                ->addSelect('ins')
        ;

        return $qb->getQuery()
                        ->getResult();
    }

}
