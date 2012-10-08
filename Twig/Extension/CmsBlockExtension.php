<?php

namespace MFB\CmsBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

use MFB\CmsBundle\Service\CmsBlockService;

/**
 * Extension to include CMS blocks
 */
class CmsBlockExtension extends \Twig_Extension
{
    /**
     * @var CmsBlockService
     */
    protected $block;

    /**
     * Constructor
     *
     * @param CmsBlockService $block
     *
     * @return CmsBlockExtension
     */
    public function __construct(CmsBlockService $block)
    {
        $this->block = $block;
    }

    /**
     * Returns a list of functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'cmsblock' => new \Twig_Function_Method($this, 'getBlock', array(
                'is_safe' => array('html')
            ))
        );
    }

    /**
     * Returns block content.
     *
     * @param string $name
     *
     * @return string
     */
    public function getBlock($name)
    {
        return $this->block->getContent($name);
    }

    /**
     * Name of this extension
     *
     * @return string
     */
    public function getName()
    {
        return 'CmsBlock';
    }

}

