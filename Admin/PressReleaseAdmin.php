<?php
namespace MFB\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
    Sonata\AdminBundle\Form\FormMapper,
    Sonata\AdminBundle\Datagrid\ListMapper;

/**
 * block admin
 */
class PressReleaseAdmin extends Admin
{
    /**
     * The label class name  (used in the title/breadcrumb ...)
     *
     * @var string
     */
    protected $classnameLabel = 'pressrelease';

    /**
     * The base route pattern used to generate the routing information
     *
     * @var string
     */
    protected $baseRoutePattern = '/pressreleases';

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('releasedAt')
            ->add('_action', 'actions', array(
            'actions' => array(
                'edit' => array(),
            )
        ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
            ->add('title', null, array('required' => true))
            ->add('releasedAt', null, array('required' => true))
            ->end()
            ->with('Downloads')
            ->add('pressReleaseFiles', 'sonata_type_model', array('expanded' => true, 'multiple' => true))
            ->add('teaser', null, array(
                'required' => false,
                'attr' => array(
                    'class'      => 'wysiwyg'
                )
            ))
            ->end()
            ->with('Content')
            ->add('content', null, array(
                'required' => false,
                'attr' => array(
                    'class'      => 'wysiwyg',
                    'data-theme' => 'advanced'
                )
            ))
            ->end();
    }
}