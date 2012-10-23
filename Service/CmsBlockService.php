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
     *
     * @return Block
     */
    public function __construct(EntityManager $em, TwigEngine $twigstring, AbstractCache $cache)
    {
        $this->em         = $em;
        $this->twigstring = $twigstring;
        $this->cache      = $cache;
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
        $cacheId = self::CACHE_PREFIX . $name;
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
        $cacheId = self::CACHE_PREFIX . $name;
        $this->cache->delete($cacheId);
    }
}
