<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ToolFamily
 *
 * @ORM\Table(name="tool_family")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToolFamilyRepository")
 */
class ToolFamily
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
     * @ORM\Column(name="nameDe", type="string", length=255)
     */
    private $nameDe;

    /**
     * @var string
     *
     * @ORM\Column(name="nameEn", type="string", length=255)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="nameIt", type="string", length=255)
     */
    private $nameIt;

    /**
     * @var string
     *
     * @ORM\Column(name="helpFr", type="text", nullable=true)
     */
    private $helpFr;

    /**
     * @var string
     *
     * @ORM\Column(name="helpDe", type="text", nullable=true)
     */
    private $helpDe;

    /**
     * @var string
     *
     * @ORM\Column(name="helpEn", type="text", nullable=true)
     */
    private $helpEn;

    /**
     * @var string
     *
     * @ORM\Column(name="helpIt", type="text", nullable=true)
     */
    private $helpIt;


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
     * @return ToolFamily
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
     * @return ToolFamily
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
     * @return ToolFamily
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
     * @return ToolFamily
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

    /**
     * Set helpFr
     *
     * @param string $helpFr
     * @return ToolFamily
     */
    public function setHelpFr($helpFr)
    {
        $this->helpFr = $helpFr;

        return $this;
    }

    /**
     * Get helpFr
     *
     * @return string 
     */
    public function getHelpFr()
    {
        return $this->helpFr;
    }

    /**
     * Set helpDe
     *
     * @param string $helpDe
     * @return ToolFamily
     */
    public function setHelpDe($helpDe)
    {
        $this->helpDe = $helpDe;

        return $this;
    }

    /**
     * Get helpDe
     *
     * @return string 
     */
    public function getHelpDe()
    {
        return $this->helpDe;
    }

    /**
     * Set helpEn
     *
     * @param string $helpEn
     * @return ToolFamily
     */
    public function setHelpEn($helpEn)
    {
        $this->helpEn = $helpEn;

        return $this;
    }

    /**
     * Get helpEn
     *
     * @return string 
     */
    public function getHelpEn()
    {
        return $this->helpEn;
    }

    /**
     * Set helpIt
     *
     * @param string $helpIt
     * @return ToolFamily
     */
    public function setHelpIt($helpIt)
    {
        $this->helpIt = $helpIt;

        return $this;
    }

    /**
     * Get helpIt
     *
     * @return string 
     */
    public function getHelpIt()
    {
        return $this->helpIt;
    }
}
