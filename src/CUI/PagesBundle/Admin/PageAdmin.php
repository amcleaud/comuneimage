<?php

namespace CUI\PagesBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('rubrique', 'entity', array(
            'class' => 'CUI\PagesBundle\Entity\Rubrique',
            'choice_label' => 'nom'
            ))
        ;
        $formMapper->add('nom', 'text');
        $formMapper->add('titre', 'text');
        $formMapper->add('contenu', 'sonata_simple_formatter_type', array(
                                                                            'format' => 'richhtml',
                                                                            'ckeditor_context'     => 'default'
                                                                        )
                );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom');
    }

    public function toString($object) {
        return $object instanceof Page
            ? $object->getTitre()
            : 'Page';
    }
}