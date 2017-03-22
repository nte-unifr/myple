<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="helpFr", type="text")
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
     * @ORM\Column(name="helpIt", type="text", nullable=true)
     */
    private $helpIt;

    /**
     * @var string
     *
     * @ORM\Column(name="helpEn", type="text", nullable=true)
     */
    private $helpEn;

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
     * @ORM\Column(name="goalFr", type="text")
     */
    private $goalFr;

    /**
     * @var string
     *
     * @ORM\Column(name="goalDe", type="text", nullable=true)
     */
    private $goalDe;

    /**
     * @var string
     *
     * @ORM\Column(name="goalIt", type="text", nullable=true)
     */
    private $goalIt;

    /**
     * @var string
     *
     * @ORM\Column(name="goalEn", type="text", nullable=true)
     */
    private $goalEn;

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
     * Set helpFr
     *
     * @param string $helpFr
     * @return Activity
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
     * @return Activity
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
     * Set helpIt
     *
     * @param string $helpIt
     * @return Activity
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
     * Set helpEn
     *
     * @param string $helpEn
     * @return Activity
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
     * Set goalFr
     *
     * @param string $goalFr
     * @return Activity
     */
    public function setGoalFr($goalFr)
    {
        $this->goalFr = $goalFr;

        return $this;
    }

    /**
     * Get goalFr
     *
     * @return string 
     */
    public function getGoalFr()
    {
        return $this->goalFr;
    }

    /**
     * Set goalDe
     *
     * @param string $goalDe
     * @return Activity
     */
    public function setGoalDe($goalDe)
    {
        $this->goalDe = $goalDe;

        return $this;
    }

    /**
     * Get goalDe
     *
     * @return string 
     */
    public function getGoalDe()
    {
        return $this->goalDe;
    }

    /**
     * Set goalIt
     *
     * @param string $goalIt
     * @return Activity
     */
    public function setGoalIt($goalIt)
    {
        $this->goalIt = $goalIt;

        return $this;
    }

    /**
     * Get goalIt
     *
     * @return string 
     */
    public function getGoalIt()
    {
        return $this->goalIt;
    }

    /**
     * Set goalEn
     *
     * @param string $goalEn
     * @return Activity
     */
    public function setGoalEn($goalEn)
    {
        $this->goalEn = $goalEn;

        return $this;
    }

    /**
     * Get goalEn
     *
     * @return string 
     */
    public function getGoalEn()
    {
        return $this->goalEn;
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
}