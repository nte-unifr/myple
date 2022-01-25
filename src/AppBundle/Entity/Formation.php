<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="titleFr", type="string", length=255)
     */
    private $titleFr;

    /**
     * @var string
     *
     * @ORM\Column(name="titleDe", type="string", length=255)
     */
    private $titleDe;

    /**
     * @var string
     *
     * @ORM\Column(name="titleIt", type="string", length=255)
     */
    private $titleIt;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionFr", type="text", nullable=true)
     */
    private $descriptionFr;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionDe", type="text", nullable=true)
     */
    private $descriptionDe;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionIt", type="text", nullable=true)
     */
    private $descriptionIt;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=true)
     */
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity="FormationTag")
     * @ORM\OrderBy({"nameFr" = "ASC"})
     * @ORM\JoinTable(name="formations_tags",
     *      joinColumns={@ORM\JoinColumn(name="formation_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $tags;

    /**
     * @ORM\ManyToMany(targetEntity="Activity")
     * @ORM\OrderBy({"nameFr" = "ASC"})
     * @ORM\JoinTable(name="formations_activities",
     *      joinColumns={@ORM\JoinColumn(name="formation_id", referencedColumnName="id", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="activity_id", referencedColumnName="id", onDelete="CASCADE")}
     *      )
     */
    private $activities;


    public function __toString()
    {
        return $this->getTitleFr();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->activities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titleFr
     *
     * @param string $title
     * @return Formation
     */
    public function setTitleFr($title)
    {
        $this->titleFr = $title;

        return $this;
    }

    /**
     * Get titleFr
     *
     * @return string 
     */
    public function getTitleFr()
    {
        return $this->titleFr;
    }

    /**
     * Set titleDe
     *
     * @param string $title
     * @return Formation
     */
    public function setTitleDe($title)
    {
        $this->titleDe = $title;

        return $this;
    }

    /**
     * Get titleDe
     *
     * @return string 
     */
    public function getTitleDe()
    {
        return $this->titleDe;
    }

    /**
     * Set titleIt
     *
     * @param string $title
     * @return Formation
     */
    public function setTitleIt($title)
    {
        $this->titleIt = $title;

        return $this;
    }

    /**
     * Get titleIt
     *
     * @return string 
     */
    public function getTitleIt()
    {
        return $this->titleIt;
    }

    /**
     * Set descriptionFr
     *
     * @param string $descriptionFr
     * @return Formation
     */
    public function setDescriptionFr($descriptionFr)
    {
        $this->descriptionFr = $descriptionFr;

        return $this;
    }

    /**
     * Get descriptionFr
     *
     * @return string 
     */
    public function getDescriptionFr()
    {
        return $this->descriptionFr;
    }

    /**
     * Set descriptionDe
     *
     * @param string $descriptionDe
     * @return Formation
     */
    public function setDescriptionDe($descriptionDe)
    {
        $this->descriptionDe = $descriptionDe;

        return $this;
    }

    /**
     * Get descriptionDe
     *
     * @return string 
     */
    public function getDescriptionDe()
    {
        return $this->descriptionDe;
    }

    /**
     * Set descriptionIt
     *
     * @param string $descriptionIt
     * @return Formation
     */
    public function setDescriptionIt($descriptionIt)
    {
        $this->descriptionIt = $descriptionIt;

        return $this;
    }

    /**
     * Get descriptionIt
     *
     * @return string 
     */
    public function getDescriptionIt()
    {
        return $this->descriptionIt;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Formation
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
     * Add tags
     *
     * @param \AppBundle\Entity\FormationTag $tags
     * @return Formation
     */
    public function addTag(\AppBundle\Entity\FormationTag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \AppBundle\Entity\FormationTag $tags
     */
    public function removeTag(\AppBundle\Entity\FormationTag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add activities
     *
     * @param \AppBundle\Entity\Activity $activities
     * @return Formation
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
