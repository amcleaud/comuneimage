<?php

namespace CUI\CoupdecoeurBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use CUI\CoupdecoeurBundle\Entity\Cadeau;
use CUI\CoupdecoeurBundle\Entity\Newsletter;
use CUI\CoupdecoeurBundle\Entity\Photo;
use CUI\CoupdecoeurBundle\Form\PhotoType;
use CUI\CoupdecoeurBundle\Form\CadeauType;
use CUI\CoupdecoeurBundle\Form\CadeauRepository;
use CUI\CoupdecoeurBundle\Repository\PhotoRepository;

class NewsletterAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('titre', 'text')
                ->add('lienFacebook', 'text', array('required'=>false))
                ->add('estPublie', 'checkbox', array('required'=>false))
            ->end()
            ->with('Cadeaux')
                ->add('cadeaux', 'sonata_type_collection', array('by_reference' => 'false', 'type_options'=>array('delete'=>true)), array('edit' => 'inline', 'inline' => 'table'))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('titre');
        $datagridMapper->add('lienFacebook');
        $datagridMapper->add('estPublie');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('titre');
        $listMapper->addIdentifier('lienFacebook');
        $listMapper->addIdentifier('estPublie', 'boolean');
    }
}