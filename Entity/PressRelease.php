<?php

namespace MFB\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
    Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Mapping\Annotation as Gedmo;

/**
 * MFB\CmsBundle\Entity\PressRelease
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MFB\CmsBundle\Entity\Repository\PressReleaseRepository")
 */
class PressRelease
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $teaser
     *
     * @ORM\Column(name="teaser", type="text")
     */
    private $teaser;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \datetime $releasedAt
     *
     * @ORM\Column(name="released_at", type="datetime")
     */
    private $releasedAt;

    /**
     * @var \DateTime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $createdAt;

    /**
     * @var \DateTime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    protected $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PressReleaseFile", mappedBy="PressRelease")
     */
    protected $pressReleaseFiles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pressReleaseFiles = new ArrayCollection();
    }

    /**
     * Get title
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @param PressReleaseFile $pressReleaseFile
     */
    public function addPressReleaseFile(PressReleaseFile $pressReleaseFile)
    {
        $this->pressReleaseFiles[] = $pressReleaseFile;
    }

    /**
     * @param ArrayCollection $pressReleaseFiles
     */
    public function setPressReleaseFiles($pressReleaseFiles)
    {
        $this->pressReleaseFiles = $pressReleaseFiles;
    }

    /**
     * @return ArrayCollection
     */
    public function getPressReleaseFiles()
    {
        return $this->pressReleaseFiles;
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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set teaser
     *
     * @param string $teaser
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;
    }

    /**
     * Get teaser
     *
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set content
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set release_at
     *
     * @param \datetime $releaseAt
     */
    public function setReleaseAt($releaseAt)
    {
        $this->releasedAt = $releaseAt;
    }

    /**
     * Get release_at
     *
     * @return \datetime
     */
    public function getReleaseAt()
    {
        return $this->releasedAt;
    }

    /**
     * Set created_at
     *
     * @param \datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return \datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updated_at
     *
     * @param \datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return \datetime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}