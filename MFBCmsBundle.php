<?php

namespace MFB\CmsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MFBCmsBundle extends Bundle
{
    /**
     * Presta sitemap bundle integration
     */
    public function boot()
    {
        /**
         * @var mixed $router
         * @var mixed $event
         */
        $router = $this->container->get('router');
        $event  = $this->container->get('event_dispatcher');

        //listen presta_sitemap.populate event
        $event->addListener(
            \Presta\SitemapBundle\Event\SitemapPopulateEvent::onSitemapPopulate,
            function (\Presta\SitemapBundle\Event\SitemapPopulateEvent $event) use ($router)
            {
                // get absolute url
                $url = $router->generate('pressrelease_list', array(), true);
                // add url to the url-set
                $event->getGenerator()->addUrl(
                    new \Presta\SitemapBundle\Sitemap\Url\UrlConcrete (
                        $url,
                        null,
                        \Presta\SitemapBundle\Sitemap\Url\UrlConcrete::CHANGEFREQ_WEEKLY,
                        1
                    ),
                    'content'
                );

            }
        );
        //listen presta_sitemap.populate event
        $event->addListener(
            \Presta\SitemapBundle\Event\SitemapPopulateEvent::onSitemapPopulate,
            function (\Presta\SitemapBundle\Event\SitemapPopulateEvent $event) use ($router)
            {
                // get absolute url
                $url = $router->generate('pressrelease_current', array(), true);
                // add url to the url-set
                $event->getGenerator()->addUrl(
                    new \Presta\SitemapBundle\Sitemap\Url\UrlConcrete (
                        $url,
                        null,
                        \Presta\SitemapBundle\Sitemap\Url\UrlConcrete::CHANGEFREQ_WEEKLY,
                        1
                    ),
                    'content'
                );

            }
        );
    }
}
