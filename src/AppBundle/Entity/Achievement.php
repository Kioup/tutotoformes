<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Achievement
 *
 * @ORM\Table(name="achievement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AchievementRepository")
 */
class Achievement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=60)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="internal_name", type="string", length=60)
     */
    private $internalName;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_secret", type="boolean", nullable=false)
     */
    private $secret = false;

    /**
     * @var UtilisateurAchievementAssociation
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\UtilisateurAchievementAssociation", mappedBy="achievement")
     */
    private $userAchievementsAssociation;

    public function isLockedFor(Utilisateur $utilisateur){

    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Achievement
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return Achievement
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Achievement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userAchievementsAssociation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add userAchievementsAssociation
     *
     * @param \AppBundle\Entity\UtilisateurAchievementAssociation $userAchievementsAssociation
     *
     * @return Achievement
     */
    public function addUserAchievementsAssociation(\AppBundle\Entity\UtilisateurAchievementAssociation $userAchievementsAssociation)
    {
        $this->userAchievementsAssociation[] = $userAchievementsAssociation;

        return $this;
    }

    /**
     * Remove userAchievementsAssociation
     *
     * @param \AppBundle\Entity\UtilisateurAchievementAssociation $userAchievementsAssociation
     */
    public function removeUserAchievementsAssociation(\AppBundle\Entity\UtilisateurAchievementAssociation $userAchievementsAssociation)
    {
        $this->userAchievementsAssociation->removeElement($userAchievementsAssociation);
    }

    /**
     * Get userAchievementsAssociation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserAchievementsAssociation()
    {
        return $this->userAchievementsAssociation;
    }

    /**
     * Set internalName
     *
     * @param string $internalName
     *
     * @return Achievement
     */
    public function setInternalName($internalName)
    {
        $this->internalName = $internalName;

        return $this;
    }

    /**
     * Get internalName
     *
     * @return string
     */
    public function getInternalName()
    {
        return $this->internalName;
    }

    /**
     * Set secret
     *
     * @param boolean $secret
     *
     * @return Achievement
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret
     *
     * @return boolean
     */
    public function getSecret()
    {
        return $this->secret;
    }
}
