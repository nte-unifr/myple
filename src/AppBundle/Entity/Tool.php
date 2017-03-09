<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tool
 *
 * @ORM\Table(name="tool")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToolRepository")
 */
class Tool
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=500, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="infoFr", type="text", nullable=true)
     */
    private $infoFr;

    /**
     * @var string
     *
     * @ORM\Column(name="infoDe", type="text", nullable=true)
     */
    private $infoDe;

    /**
     * @var string
     *
     * @ORM\Column(name="infoIt", type="text", nullable=true)
     */
    private $infoIt;

    /**
     * @var string
     *
     * @ORM\Column(name="infoEn", type="text", nullable=true)
     */
    private $infoEn;


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
     * Set name
     *
     * @param string $name
     * @return Tool
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Tool
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set infoFr
     *
     * @param string $infoFr
     * @return Tool
     */
    public function setInfoFr($infoFr)
    {
        $this->infoFr = $infoFr;

        return $this;
    }

    /**
     * Get infoFr
     *
     * @return string 
     */
    public function getInfoFr()
    {
        return $this->infoFr;
    }

    /**
     * Set infoDe
     *
     * @param string $infoDe
     * @return Tool
     */
    public function setInfoDe($infoDe)
    {
        $this->infoDe = $infoDe;

        return $this;
    }

    /**
     * Get infoDe
     *
     * @return string 
     */
    public function getInfoDe()
    {
        return $this->infoDe;
    }

    /**
     * Set infoIt
     *
     * @param string $infoIt
     * @return Tool
     */
    public function setInfoIt($infoIt)
    {
        $this->infoIt = $infoIt;

        return $this;
    }

    /**
     * Get infoIt
     *
     * @return string 
     */
    public function getInfoIt()
    {
        return $this->infoIt;
    }

    /**
     * Set infoEn
     *
     * @param string $infoEn
     * @return Tool
     */
    public function setInfoEn($infoEn)
    {
        $this->infoEn = $infoEn;

        return $this;
    }

    /**
     * Get infoEn
     *
     * @return string 
     */
    public function getInfoEn()
    {
        return $this->infoEn;
    }
}
