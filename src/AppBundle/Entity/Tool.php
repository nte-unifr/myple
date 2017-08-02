<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Tool
 *
 * @ORM\Table(name="tool")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ToolRepository")
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="ToolFamily")
     * @ORM\OrderBy({"nameFr" = "ASC"})
     * @ORM\JoinTable(name="tools_families",
     *      joinColumns={@ORM\JoinColumn(name="tool_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="family_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $families;

    /**
     * @ORM\ManyToMany(targetEntity="Activity", mappedBy="tools")
     */
    private $activities;


    public function __toString()
    {
        return $this->getName();
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

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Tool
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     *
     * @return Tool
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImageName()
    {
        return $this->imageName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->families = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Tool
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
     * Add families
     *
     * @param \AppBundle\Entity\ToolFamily $families
     * @return Tool
     */
    public function addFamily(\AppBundle\Entity\ToolFamily $families)
    {
        $this->families[] = $families;

        return $this;
    }

    /**
     * Remove families
     *
     * @param \AppBundle\Entity\ToolFamily $families
     */
    public function removeFamily(\AppBundle\Entity\ToolFamily $families)
    {
        $this->families->removeElement($families);
    }

    /**
     * Get families
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFamilies()
    {
        return $this->families;
    }

    /**
     * Add activities
     *
     * @param \AppBundle\Entity\Activity $activities
     * @return Tool
     */
    public function addActivity(\AppBundle\Entity\Activity $activities)
    {
        $this->activities[] = $activities;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \AppBundle\Entity\Activity $activities
     */
    public function removeActivity(\AppBundle\Entity\Activity $activities)
    {
        $this->activities->removeElement($activities);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActivities()
    {
        return $this->activities;
    }
}
