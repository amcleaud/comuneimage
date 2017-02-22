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
            'choice_label' => 'nom',
            'required'=>false
            ))
        ;
        $formMapper->add('nom', 'text', array('label'=>'Nom affiché dans le menu du site'));
        $formMapper->add('position', 'integer', array('label'=>'Position dans le menu'));
        $formMapper->add('titre', 'text', array('label'=>'Titre affiché dans l\'entête de la page'));
        $formMapper->add('contenu', 'sonata_simple_formatter_type', array(
                                                                            'format' => 'richhtml',
                                                                            'ckeditor_context'     => 'default'
                                                                        )
                );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('position');
        $datagridMapper->add('nom');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('position');
        $listMapper->addIdentifier('nom');
    }

    public function toString($object) {
        return $object instanceof Page
            ? $object->getTitre()
            : 'Page';
    }
}