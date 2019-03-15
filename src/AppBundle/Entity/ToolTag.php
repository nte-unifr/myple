<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ToolTag
 *
 * @ORM\Table(name="tool_tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToolTagRepository")
 */
class ToolTag
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
     * @ORM\Column(name="nameEn", type="string", length=255, nullable=true)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="nameIt", type="string", length=255, nullable=true)
     */
    private $nameIt;


    public function __construct()
    {
        $this->tools = new ArrayCollection();
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
     * @return ToolTag
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
     * @return ToolTag
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
     * Set nameEn
     *
     * @param string $nameEn
     * @return ToolTag
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * Get nameEn
     *
     * @return string 
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * Set nameIt
     *
     * @param string $nameIt
     * @return ToolTag
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
