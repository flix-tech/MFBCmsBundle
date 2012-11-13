<?php

namespace MFB\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MFB\CmsBundle\Entity\PressReleaseFile
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MFB\CmsBundle\Entity\Repository\PressReleaseFileRepository")
 */
class PressReleaseFile
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
     * @var string $filepath
     *
     * @ORM\Column(name="filepath", type="string", length=255)
     */
    private $filepath;

    /**
     * @var int $sort
     *
     * @ORM\Column(name="sort", type="smallint")
     */
    private $sort;

    /**
     * @var PressRelease
     *
     * @ORM\ManyToOne(targetEntity="PressRelease", inversedBy="PressReleaseFiles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="press_release_id", referencedColumnName="id")
     * })
     */
    protected $pressRelease;


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
     * Set filepath
     *
     * @param string $filepath
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * Get filepath
     *
     * @return string 
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * Set sort
     *
     * @param int $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * Get sort
     *
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set order
     *
     * @param PressRelease $pressRelease
     */
    public function setPressRelease(PressRelease $pressRelease)
    {
        $this->pressRelease = $pressRelease;
    }

    /**
     * Get order
     *
     * @return PressRelease
     */
    public function getPressRelease()
    {
        return $this->pressRelease;
    }
}