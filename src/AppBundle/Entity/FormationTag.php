<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * FormationTag
 *
 * @ORM\Table(name="formation_tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationTagRepository")
 */
class FormationTag
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
     * @ORM\Column(name="nameFr", type="string", length=255)
     */
    private $nameFr;

    /**
     * @var string
     *
     * @ORM\Column(name="nameDe", type="string", length=255, nullable=true)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="nameIt", type="string", length=255, nullable=true)
     */
    private $nameIt;


    public function __construct()
    {
        $this->formations = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getNameFr();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameFr
     *
     * @param string $nameFr
     * @return FormationTag
     */
    public function setNameFr($nameFr)
    {
        $this->nameFr = $nameFr;

        return $this;
    }

    /**
     * Get nameFr
     *
     * @return string 
     */
    public function getNameFr()
    {
        return $this->nameFr;
    }

    /**
     * Set nameDe
     *
     * @param string $nameDe
     * @return FormationTag
     */
    public function setNameDe($nameDe)
    {
        $this->nameDe = $nameDe;

        return $this;
    }

    /**
     * Get nameDe
     *
     * @return string 
     */
    public function getNameDe()
    {
        return $this->nameDe;
    }

    /**
     * Set nameIt
     *
     * @param string $nameIt
     * @return FormationTag
     */
    public function setNameIt($nameIt)
    {
        $this->nameIt = $nameIt;

        return $this;
    }

    /**
     * Get nameIt
     *
     * @return string 
     */
    public function getNameIt()
    {
        return $this->nameIt;
    }
}
