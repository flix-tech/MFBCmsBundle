<?php

namespace MFB\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Smurfy\DoctrineEnumBundle\Validator as EnumAssert;

use MFB\CmsBundle\Entity\Types\BlockTypeType,
    MFB\CmsBundle\Entity\Types\BlockStatusType;

/**
 * MFB\CmsBundle\Entity\Block
 *
 * @ORM\Table(name="blocks")
 * @ORM\Entity(repositoryClass="MFB\CmsBundle\Entity\Repository\BlockRepository")
 */
class Block
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
     * @var string $slug
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\Column(name="type", type="BlockTypeType", nullable=false)
     * @EnumAssert\DoctrineEnumType(
     *    entity="MFB\CmsBundle\Entity\Types\BlockTypeType"
     * )
     *
     * @var string $status
     */
    private $type = BlockTypeType::TEXT;

    /**
     * @ORM\Column(name="status", type="BlockStatusType", nullable=false)
     * @EnumAssert\DoctrineEnumType(
     *    entity="MFB\CmsBundle\Entity\Types\BlockStatusType"
     * )
     *
     * @var string $status
     */
    private $status = BlockStatusType::DISABLED;


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
     * Get title
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
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
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}