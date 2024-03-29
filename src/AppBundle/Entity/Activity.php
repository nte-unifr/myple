<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActivityRepository")
 */
class Activity
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
     * @ORM\Column(name="stepsFr", type="text")
     */
    private $stepsFr;

    /**
     * @var string
     *
     * @ORM\Column(name="stepsDe", type="text", nullable=true)
     */
    private $stepsDe;

    /**
     * @var string
     *
     * @ORM\Column(name="stepsIt", type="text", nullable=true)
     */
    private $stepsIt;

    /**
     * @var string
     *
     * @ORM\Column(name="stepsEn", type="text", nullable=true)
     */
    private $stepsEn;

    /**
     * @var string
     *
     * @ORM\Column(name="refFr", type="text", nullable=true)
     */
    private $refFr;

    /**
     * @var string
     *
     * @ORM\Column(name="refDe", type="text", nullable=true)
     */
    private $refDe;

    /**
     * @var string
     *
     * @ORM\Column(name="refIt", type="text", nullable=true)
     */
    private $refIt;

    /**
     * @var string
     *
     * @ORM\Column(name="refEn", type="text", nullable=true)
     */
    private $refEn;

    /**
     * @var string
     *
     * @ORM\Column(name="biblio", type="text", nullable=true)
     */
    private $biblio;

    /**
     * @ORM\ManyToOne(targetEntity="Task", inversedBy="activities")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id", nullable=false)
     */
    private $task;

    /**
     * @ORM\ManyToMany(targetEntity="Tool", inversedBy="activities")
     * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="activities_tools",
     *      joinColumns={@ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tool_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $tools;

    /**
     * @ORM\ManyToMany(targetEntity="Resource", inversedBy="activities")
     * @ORM\OrderBy({"name" = "ASC"})
     * @ORM\JoinTable(name="activities_resources",
     *      joinColumns={@ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="resource_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $resources;

    /**
     * @var int
     *
     * @ORM\Column(name="rank", type="integer")
     */
    private $rank;

    /**
     * @var boolean
     *
     * @ORM\Column(name="training", type="boolean")
     */
    private $training;

    /**
     * @ORM\ManyToMany(targetEntity="Formation", mappedBy="activities")
     */
    private $formations;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @var \Date
     */
    private $humanUpdatedAt;

    public function __construct() {
        $this->tools = new \Doctrine\Common\Collections\ArrayCollection();
        $this->resources = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Activity
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
     * @return Activity
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
     * @return Activity
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
     * @return Activity
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
     * Set stepsFr
     *
     * @param string $stepsFr
     * @return Activity
     */
    public function setStepsFr($stepsFr)
    {
        $this->stepsFr = $stepsFr;

        return $this;
    }

    /**
     * Get stepsFr
     *
     * @return string
     */
    public function getStepsFr()
    {
        return $this->stepsFr;
    }

    /**
     * Set stepsDe
     *
     * @param string $stepsDe
     * @return Activity
     */
    public function setStepsDe($stepsDe)
    {
        $this->stepsDe = $stepsDe;

        return $this;
    }

    /**
     * Get stepsDe
     *
     * @return string
     */
    public function getStepsDe()
    {
        return $this->stepsDe;
    }

    /**
     * Set stepsIt
     *
     * @param string $stepsIt
     * @return Activity
     */
    public function setStepsIt($stepsIt)
    {
        $this->stepsIt = $stepsIt;

        return $this;
    }

    /**
     * Get stepsIt
     *
     * @return string
     */
    public function getStepsIt()
    {
        return $this->stepsIt;
    }

    /**
     * Set stepsEn
     *
     * @param string $stepsEn
     * @return Activity
     */
    public function setStepsEn($stepsEn)
    {
        $this->stepsEn = $stepsEn;

        return $this;
    }

    /**
     * Get stepsEn
     *
     * @return string
     */
    public function getStepsEn()
    {
        return $this->stepsEn;
    }

    /**
     * Set refFr
     *
     * @param string $refFr
     * @return Activity
     */
    public function setRefFr($refFr)
    {
        $this->refFr = $refFr;

        return $this;
    }

    /**
     * Get refFr
     *
     * @return string
     */
    public function getRefFr()
    {
        return $this->refFr;
    }

    /**
     * Set refDe
     *
     * @param string $refDe
     * @return Activity
     */
    public function setRefDe($refDe)
    {
        $this->refDe = $refDe;

        return $this;
    }

    /**
     * Get refDe
     *
     * @return string
     */
    public function getRefDe()
    {
        return $this->refDe;
    }

    /**
     * Set refIt
     *
     * @param string $refIt
     * @return Activity
     */
    public function setRefIt($refIt)
    {
        $this->refIt = $refIt;

        return $this;
    }

    /**
     * Get refIt
     *
     * @return string
     */
    public function getRefIt()
    {
        return $this->refIt;
    }

    /**
     * Set refEn
     *
     * @param string $refEn
     * @return Activity
     */
    public function setRefEn($refEn)
    {
        $this->refEn = $refEn;

        return $this;
    }

    /**
     * Get refEn
     *
     * @return string
     */
    public function getRefEn()
    {
        return $this->refEn;
    }

    /**
     * Set biblio
     *
     * @param string $biblio
     * @return Activity
     */
    public function setBiblio($biblio)
    {
        $this->biblio = $biblio;

        return $this;
    }

    /**
     * Get biblio
     *
     * @return string
     */
    public function getBiblio()
    {
        return $this->biblio;
    }

    /**
     * Set task
     *
     * @param \AppBundle\Entity\Task $task
     * @return Activity
     */
    public function setTask(\AppBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \AppBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Add tools
     *
     * @param \AppBundle\Entity\Tool $tools
     * @return Activity
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
     * Set rank
     *
     * @param integer $rank
     * @return Activity
     */
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get rank
     *
     * @return integer
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set humanUpdatedAt
     *
     * @param \DateTime $humanUpdatedAt
     * @return Activity
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

    /**
     * Set training.
     *
     * @param bool $training
     *
     * @return Activity
     */
    public function setTraining($training)
    {
        $this->training = $training;

        return $this;
    }

    /**
     * Get training.
     *
     * @return bool
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * Get formation.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
        return $this->formations;
    }
}
