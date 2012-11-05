<?php

namespace MFB\CmsBundle\Service;

use MFB\CmsBundle\Entity\Block;

use Doctrine\Common\Cache\AbstractCache;

use Doctrine\ORM\EntityManager;

use Symfony\Bundle\TwigBundle\TwigEngine;

use MFB\CmsBundle\Entity\Types\BlockStatusType;

/**
 * Cms block service
 */
class CmsBlockService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var TwigEngine
     */
    protected $twigstring;

    /**
     * @var AbstractCache
     */
    protected $cache;

    /**
     * @var string
     */
    protected $cachePrefix;

    /**
     * @const Cache ID prefix
     */
    const CACHE_PREFIX = 'cmsblock.';

    /**
     * @const Cache expiration in seconds
     */
    const CACHE_EXPIRATION = 86400;

    /**
     * @param EntityManager $em         Entity manager
     * @param TwigEngine    $twigstring Twig engine
     * @param AbstractCache $cache      Cache driver
     * @param \AppKernel    $kernel
     *
     * @return CmsBlockService
     */
    public function __construct(EntityManager $em, TwigEngine $twigstring, AbstractCache $cache, $kernel)
    {
        $this->em          = $em;
        $this->twigstring  = $twigstring;
        $this->cache       = $cache;
        $this->cachePrefix = $kernel->getEnvironment() . '.' . self::CACHE_PREFIX;
    }

    /**
     * Get block content
     *
     * @param string $name
     *
     * @return string
     */
    public function getContent($name)
    {
        $content = '';
        $cacheId = $this->cachePrefix . $name;
        if (!$this->cache->contains($cacheId)) {
            /** @var $blockRepository \MFB\CmsBundle\Entity\Repository\BlockRepository */
            $blockRepository = $this->em->getRepository('MFBCmsBundle:Block');
            /** @var $block Block */
            $block = $blockRepository->findOneBy(array('slug' => $name, 'status' => BlockStatusType::ENABLED));

            if ($block && ($block->getStatus() == BlockStatusType::ENABLED)) {
                $content = $block->getContent();
            }

            $this->cache->save($cacheId, $content, self::CACHE_EXPIRATION);
        } else {
            $content = $this->cache->fetch($cacheId);
        }

        return $this->twigstring->render($content);
    }

    /**
     * Remove this block from cache
     *
     * @param string $name Block slug
     */
    public function clearCache($name)
    {
        $cacheId = $this->cachePrefix . $name;
        $this->cache->delete($cacheId);
    }
}
