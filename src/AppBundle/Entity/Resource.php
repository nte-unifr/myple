<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Resource
 *
 * @ORM\Table(name="resource")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResourceRepository")
 * @Vich\Uploadable
 */
class Resource
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
     * @ORM\Column(name="url", type="string", length=500)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="string", length=50)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="additional", type="text", nullable=true)
     */
    private $additional;

    /**
     * @ORM\ManyToOne(targetEntity="ResourceType")
     * @ORM\JoinColumn(name="type_id", referencedColumnName="id", nullable=true)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tutorial", type="boolean")
     */
    private $tutorial;

    /**
     * @Vich\UploadableField(mapping="uploads", fileNameProperty="imageName")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="Tool")
     * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="resources_tools",
     *      joinColumns={@ORM\JoinColumn(name="resource_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tool_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $tools;

    /**
     * @ORM\ManyToMany(targetEntity="Lang")
     * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="resources_langs",
     *      joinColumns={@ORM\JoinColumn(name="resource_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="lang_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $langs;

    /**
     * @ORM\ManyToMany(targetEntity="Task", mappedBy="resources")
     **/
    private $tasks;

    /**
     * @ORM\ManyToMany(targetEntity="Activity", mappedBy="resources")
     **/
    private $activities;

    public function __construct() {
        $this->tools = new \Doctrine\Common\Collections\ArrayCollection();
        $this->langs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName() . ' (' . $this->getAuthor() . ', ' . $this->getDate() . ')';
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
     * @return Resource
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
     * Set url
     *
     * @param string $url
     * @return Resource
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set date
     *
     * @param string $date
     * @return Resource
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Resource
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set additional
     *
     * @param string $additional
     * @return Resource
     */
    public function setAdditional($additional)
    {
        $this->additional = $additional;

        return $this;
    }

    /**
     * Get additional
     *
     * @return string 
     */
    public function getAdditional()
    {
        return $this->additional;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\ResourceType $type
     * @return Resource
     */
    public function setType(\AppBundle\Entity\ResourceType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\ResourceType 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set tutorial
     *
     * @param boolean $tutorial
     * @return Resource
     */
    public function setTutorial($tutorial)
    {
        $this->tutorial = $tutorial;

        return $this;
    }

    /**
     * Get tutorial
     *
     * @return boolean 
     */
    public function getTutorial()
    {
        return $this->tutorial;
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Resource
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
     * Add tools
     *
     * @param \AppBundle\Entity\Tool $tools
     * @return Resource
     */
    public function addTool(\AppBundle\Entity\Tool $tools)
    {
        $this->tools[] = $tools;

        return $this;
    }

    /**
     * Remove tools
     *
     * @param \AppBundle\Entity\Tool $tools
     */
    public function removeTool(\AppBundle\Entity\Tool $tools)
    {
        $this->tools->removeElement($tools);
    }

    /**
     * Get tools
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTools()
    {
        return $this->tools;
    }

    /**
     * Add langs
     *
     * @param \AppBundle\Entity\Lang $langs
     * @return Resource
     */
    public function addLang(\AppBundle\Entity\Lang $langs)
    {
        $this->langs[] = $langs;

        return $this;
    }

    /**
     * Remove langs
     *
     * @param \AppBundle\Entity\Lang $langs
     */
    public function removeLang(\AppBundle\Entity\Lang $langs)
    {
        $this->langs->removeElement($langs);
    }

    /**
     * Get langs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLangs()
    {
        return $this->langs;
    }
}
