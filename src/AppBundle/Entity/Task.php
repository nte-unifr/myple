<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * Task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
 * @Vich\Uploadable
 */
class Task
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

    /**
     * @var string
     *
     * @ORM\Column(name="nameEn", type="string", length=255, nullable=true)
     */
    private $nameEn;

    /**
     * @var string
     *
     * @ORM\Column(name="help", type="text", nullable=true)
     */
    private $help;

    /**
     * @ORM\OrderBy({"rank" = "ASC"})
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="task")
     */
    private $activities;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $recap;

    /**
     * @Vich\UploadableField(mapping="task_recap", fileNameProperty="recap")
     * @var File
     */
    private $recapFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \Date
     */
    private $humanUpdatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="Resource", inversedBy="tasks")
     * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="tasks_resources",
     *      joinColumns={@ORM\JoinColumn(name="task_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="resource_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $resources;


    public function __construct() {
        $this->resources = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new ArrayCollection();
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
     * @return Task
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
     * @return Task
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
     * @return Task
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
     * Set nameEn
     *
     * @param string $nameEn
     * @return Task
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
     * Add activities
     *
     * @param \AppBundle\Entity\Activity $activities
     * @return Task
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

    /**
     * Set help
     *
     * @param string $help
     * @return Task
     */
    public function setHelp($help)
    {
        $this->help = $help;

        return $this;
    }

    /**
     * Get help
     *
     * @return string 
     */
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return Task
     */
    public function setRecapFile(File $file = null)
    {
        $this->recapFile = $file;

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
    public function getRecapFile()
    {
        return $this->recapFile;
    }

    /**
     * @param string $recap
     *
     * @return Task
     */
    public function setRecap($recap)
    {
        $this->recap = $recap;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRecap()
    {
        return $this->recap;
    }

    /**
     * Add resources
     *
     * @param \AppBundle\Entity\Resource $resources
     * @return Activity
     */
    public function addResource(\AppBundle\Entity\Resource $resources)
    {
        $this->resources[] = $resources;

        return $this;
    }

    /**
     * Remove resources
     *
     * @param \AppBundle\Entity\Resource $resources
     */
    public function removeResource(\AppBundle\Entity\Resource $resources)
    {
        $this->resources->removeElement($resources);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Task
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
     * @return Task
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
