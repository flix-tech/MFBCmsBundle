<?php

namespace MFB\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route,
    Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Press release frontend controller
 */
class PressController extends Controller
{

    /**
     * @Route("presse/archiv", name="pressrelease_list")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        /** @var $query \Doctrine\ORM\Query */
        $query = $em->createQuery(
            'SELECT p FROM MFBCmsBundle:PressRelease p ORDER BY p.releasedAt DESC'
        );
        $query->execute();

        $release = $query->getResult();

        return array('pressreleases' => $release);
    }

    /**
     * @Route("presse/aktuell", name="pressrelease_current")
     * @Template()
     */
    public function currentAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        /** @var $query \Doctrine\ORM\Query */
        $query = $em->createQuery(
            'SELECT p FROM MFBCmsBundle:PressRelease p ORDER BY p.releasedAt DESC'
        );
        $query->setFirstResult(0)->setMaxResults(1)->execute();

        $release = $query->getSingleResult();

        return array('pressrelease' => $release);
    }
}
