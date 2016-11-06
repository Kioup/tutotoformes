<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Achievement;
use AppBundle\Entity\Utilisateur;

/**
 * UtilisateurAchievementAssociationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UtilisateurAchievementAssociationRepository extends \Doctrine\ORM\EntityRepository
{

    public function haveUserUnlocked(Utilisateur $utilisateur, Achievement $achievement){
        $qb = $this->getEntityManager()->createQueryBuilder();
        $result =  $qb->select('utilisateur_achievement_association')
            ->from('AppBundle:UtilisateurAchievementAssociation', 'utilisateur_achievement_association')
            ->where('utilisateur_achievement_association.achievement = :achievement')
            ->setParameter('achievement', $achievement)
            ->andWhere('utilisateur_achievement_association.utilisateur = :user')
            ->setParameter('user', $utilisateur)
            ->getQuery()
            ->getScalarResult();
        if(count($result) > 0) {
            return true;
        }
        return false;

    }

}