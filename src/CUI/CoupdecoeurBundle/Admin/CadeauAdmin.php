<?php

namespace CUI\CoupdecoeurBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

use CUI\CoupdecoeurBundle\Entity\Cadeau;
use CUI\CoupdecoeurBundle\Entity\Photo;
use CUI\CoupdecoeurBundle\Form\PhotoType;
use CUI\CoupdecoeurBundle\Repository\PhotoRepository;
use Application\Sonata\MediaBundle\Entity\Media;

class CadeauAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Infos')
                ->add('nom', 'text')
                ->add('description', 'sonata_simple_formatter_type', array(
                                                                            'format' => 'richhtml',
                                                                            'ckeditor_context'     => 'desckdo'
                                                                        ))
                ->add('ordre', 'hidden',array('attr'=>array("hidden" => true)))
            ->end()
            ->with('Photos')
                ->add('photos', 'sonata_type_collection', array('by_reference' => 'false'), array('edit' => 'inline', 'inline' => 'table'))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom');
        $datagridMapper->add('description');
        $datagridMapper->add('ordre');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom');
        $listMapper->addIdentifier('description');
        $listMapper->addIdentifier('ordre');
    }
}