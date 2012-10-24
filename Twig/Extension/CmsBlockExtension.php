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
    protected $blockService;

    /**
     * Constructor
     *
     * @param CmsBlockService $blockService
     *
     * @return CmsBlockExtension
     */
    public function __construct(CmsBlockService $blockService)
    {
        $this->blockService = $blockService;
    }

    /**
     * Returns a list of functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'cmsblock' => new \Twig_Function_Method($this, 'getCmsBlock', array(
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
    public function getCmsBlock($name)
    {
        return $this->blockService->getContent($name);
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

