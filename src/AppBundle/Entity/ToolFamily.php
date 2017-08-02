<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ToolFamily
 *
 * @ORM\Table(name="tool_family")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToolFamilyRepository")
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $comparativeFr;

    /**
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="comparativeFr")
     * @var File
     */
    private $comparativeFileFr;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;


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

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \Date
     */
    private $humanUpdatedAt;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return ToolFamily
     */
    public function setComparativeFileFr(File $file = null)
    {
        $this->comparativeFileFr = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getComparativeFileFr()
    {
        return $this->comparativeFileFr;
    }

    /**
     * @param string $comparativeFr
     *
     * @return ToolFamily
     */
    public function setComparativeFr($comparativeFr)
    {
        $this->comparativeFr = $comparativeFr;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComparativeFr()
    {
        return $this->comparativeFr;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return ToolFamily
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set humanUpdatedAt
     *
     * @param \DateTime $humanUpdatedAt
     * @return ToolFamily
     */
    public function setHumanUpdatedAt($humanUpdatedAt)
    {
        $this->humanUpdatedAt = $humanUpdatedAt;

        return $this;
    }

    /**
     * Get humanUpdatedAt
     *
     * @return \DateTime 
     */
    public function getHumanUpdatedAt()
    {
        return $this->humanUpdatedAt;
    }
}
